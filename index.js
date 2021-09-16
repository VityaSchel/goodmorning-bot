import fsnative from 'fs'
import fs from 'fs/promises'
import fetch from 'node-fetch'
import FormData from 'form-data'

import readConfig from 'src/readConfig.js'
import getPicture from 'src/getPicture.js'
import workDir from 'src/workDir.js'

const config = readConfig()
if(config.paused) {
  console.log('Bot is paused. To resume, please set "paused" to false in config/bot.json')
  process.exit(0)
}

const currentDay = new Date().getDay()
const sunday = 0 // воскресенье
if(currentDay === sunday) {
  console.log('Today is sunday! :)')
  process.exit(0)
}

const accessToken = process.env.VK_API_ACCESS_TOKEN
const peerId = config.vkPeerID

const todaysImage = getPicture()
await downloadImage()
let gif = false,
    filename = `${workDir}/tmp_picture`

const response = await fetch(todayImage)
const buffer = await response.buffer()
fs.writeFileSync(filename, buffer)

const contentType = response.headers.get('content-type')
switch(contentType) {
  case 'image/gif':
    gif = true
    filename = __dirname+'/tmp_picture.gif'
    await fs.rename(__dirname+'/tmp_picture', filename)
    break

  case 'image/jpeg':
    filename = __dirname+'/tmp_picture.jpeg'
    await fs.rename(__dirname+'/tmp_picture', filename)
    break

  default:
    filename = __dirname+'/tmp_picture.png'
    await fs.rename(__dirname+'/tmp_picture', filename)
    break
}

let uploadUrl
if(gif){
  let gifUploadURLResponseRaw = await fetch(`https://api.vk.com/method/docs.getMessagesUploadServer?type=doc&peer_id=${peerId}&v=5.131&access_token=${accessToken}`)
  let gifUploadURLResponse = await gifUploadURLResponseRaw.json()
  if(!gifUploadURLResponse.response) { throw gifUploadURLResponse }
  uploadUrl = gifUploadURLResponse.response.upload_url
} else {
  let photoUploadURLResponseRaw = await fetch(`https://api.vk.com/method/photos.getMessagesUploadServer?peer_id=${peerId}&v=5.131&access_token=${accessToken}`)
  let photoUploadURLResponse = await photoUploadURLResponseRaw.json()
  uploadUrl = photoUploadURLResponse.response.upload_url
}

const formData = new FormData()
if(gif){
  formData.append('file', fsnative.createReadStream(filename))
} else {
  formData.append('photo', fsnative.createReadStream(filename))
}

let fileUploadResponseRaw = await fetch(uploadUrl, { method: "POST", body: formData })
let fileUploadResponse = await fileUploadResponseRaw.json()

let attachment
if(gif) {
  let docsSaveResponseRaw = await fetch(`https://api.vk.com/method/docs.save?file=${fileUploadResponse.file}&v=5.131&access_token=${accessToken}`)
  let docsSaveResponse = await docsSaveResponseRaw.json()
  let result = docsSaveResponse.response[0]
  attachment = `doc${result.owner_id}_${result.id}`
} else {
  let photoSaveResponseRaw = await fetch(`https://api.vk.com/method/photos.saveMessagesPhoto?photo=${fileUploadResponse.photo}&server=${fileUploadResponse.server}&hash=${fileUploadResponse.hash}&v=5.131&access_token=${accessToken}`)
  let photoSaveResponse = await photoSaveResponseRaw.json()
  let result = photoSaveResponse.response[0]
  attachment = `photo${result.owner_id}_${result.id}`
}

await fetch(`https://api.vk.com/method/messages.send?peer_id=${peerId}&random_id=&attachment=${attachment}&v=5.131&access_token=${accessToken}`)
await fs.unlink(filename)
console.log('Posted!')
