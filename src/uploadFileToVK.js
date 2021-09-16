import FormData from 'form-data'
import fs from 'fs'
import fetch from 'node-fetch'

export default async function uploadFileToVK(uploadURL, filename, isGif) {
  const accessToken = process.env.VK_API_ACCESS_TOKEN
  
  const formData = new FormData()
  formData.append(isGif ? 'file' : 'photo', fs.createReadStream(filename))

  const fileUploadResponseRaw = await fetch(uploadURL, { method: 'POST', body: formData })
  const fileUploadResponse = await fileUploadResponseRaw.json()

  const docsSave = `https://api.vk.com/method/docs.save?file=${fileUploadResponse.file}&v=5.131&access_token=${accessToken}`
  const photosSave = `https://api.vk.com/method/photos.saveMessagesPhoto?photo=${fileUploadResponse.photo}&server=${fileUploadResponse.server}&hash=${fileUploadResponse.hash}&v=5.131&access_token=${accessToken}`

  let attachmentSaveResponseRaw = await fetch(isGif ? docsSave : photosSave)
  let attachmentSaveResponse = await attachmentSaveResponseRaw.json()
  let result
  try {
    result = attachmentSaveResponse.response[0]
  } catch(e) {
    throw 'An error occured while trying to access attachment field in response. Response: ${attachmentSaveResponse}'
  }

  const attachment = `${isGif ? 'doc' : 'photo'}${result.owner_id}_${result.id}`
  return attachment
}
