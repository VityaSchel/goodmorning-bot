import fetch from 'node-fetch'
import readConfig from './readConfig.js'

export default async function sendAttachment(attachment: string) {
  const peerId = readConfig().vkPeerID
  const accessToken = process.env.VK_API_ACCESS_TOKEN as string

  const endpointURL = 'https://api.vk.com/method/messages.send'
  const query = new URLSearchParams({
    peer_id: peerId,
    random_id: '',
    attachment,
    v: '5.131',
    access_token: accessToken
  })
  await fetch(`${endpointURL}?${query}`)
  return true
}
