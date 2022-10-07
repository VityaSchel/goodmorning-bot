import fetch from 'node-fetch'
import readConfig from './readConfig.js'

export default async function getUploadURL(isGif) {
  const peerId = readConfig().vkPeerID
  const accessToken = process.env.VK_API_ACCESS_TOKEN

  const photosApiURL = `https://api.vk.com/method/photos.getMessagesUploadServer?peer_id=${peerId}&v=5.131&access_token=${accessToken}`
  const gifsApiURL = `https://api.vk.com/method/docs.getMessagesUploadServer?type=doc&peer_id=${peerId}&v=5.131&access_token=${accessToken}`

  let responseRaw = await fetch(isGif ? gifsApiURL : photosApiURL)
  let uploadURLResponse
  try {
    uploadURLResponse = await responseRaw.json()
  } catch (e) {
    throw `Couldn't parse server response: ${e.message}`
  }

  let uploadUrl
  try {
    uploadUrl = uploadURLResponse.response.upload_url
  } catch (e) {
    throw `An error occured while trying to access upload_url field in response. Response: ${JSON.stringify(uploadURLResponse)}`
  }

  return uploadUrl
}
