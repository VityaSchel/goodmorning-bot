import FormData from 'form-data'
import * as fs from 'fs'
import fetch from 'node-fetch'

export default async function uploadFileToVK(uploadURL: string, filename: string, isGif: boolean) {
  const accessToken = process.env.VK_API_ACCESS_TOKEN

  const formData = new FormData()
  formData.append(isGif ? 'file' : 'photo', fs.createReadStream(filename))


  const fileUploadResponseRaw = await fetch(uploadURL, { method: 'POST', body: formData })
  type UploadResponse = { file: string, photo: string, server: string, hash: string }
  const fileUploadResponse = (await fileUploadResponseRaw.json()) as UploadResponse

  const docsSave = `https://api.vk.com/method/docs.save?file=${fileUploadResponse.file}&v=5.131&access_token=${accessToken}`
  const photosSave = `https://api.vk.com/method/photos.saveMessagesPhoto?photo=${fileUploadResponse.photo}&server=${fileUploadResponse.server}&hash=${fileUploadResponse.hash}&v=5.131&access_token=${accessToken}`

  const attachmentSaveResponseRaw = await fetch(isGif ? docsSave : photosSave)
  type Doc = { owner_id: string, id: string }
  type SaveResponseGif = { response: { doc: Doc } }
  type SaveResponsePic = { response: Doc[] }
  const attachmentSaveResponse = await attachmentSaveResponseRaw.json()
  let result, ownerID, attachmentID
  try {
    if(isGif) {
      result = (attachmentSaveResponse as SaveResponseGif).response.doc
    } else {
      result = (attachmentSaveResponse as SaveResponsePic).response[0]
    }
    ownerID = result.owner_id
    attachmentID = result.id
  } catch(e) {
    throw `An error occured while trying to access attachment field in response. Response: ${JSON.stringify(attachmentSaveResponse)}`
  }

  const attachment = `${isGif ? 'doc' : 'photo'}${ownerID}_${attachmentID}`
  return attachment
}
