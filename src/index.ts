import './.env'
import fs from 'fs/promises'
import readConfig from './readConfig'
import getPicture from './getPicture'
import downloadImage from './downloadImage'
import getUploadURL from './getUploadURL'
import uploadFileToVK from './uploadFileToVK'
import sendAttachment from './sendAttachment'

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

const todaysImage = getPicture()
const { filename, isGif } = await downloadImage(todaysImage)
const uploadUrl = await getUploadURL(isGif)
const attachment = await uploadFileToVK(uploadUrl, filename, isGif)
await sendAttachment(attachment)
await fs.unlink(filename)
console.log('Posted!')
