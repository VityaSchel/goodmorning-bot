import fetch from 'node-fetch'
import fs from 'fs/promises'
import workDir from './workDir.js'

const mimeTypesToExtension = {
  'image/gif': 'gif',
  'image/jpeg': 'jpg',
  'image/jpg': 'jpg',
  'image/png': 'png'
}

export default async function downloadImage(url) {
  const response = await fetch(url)

  const contentType = response.headers.get('content-type')
  const isGif = contentType === 'image/gif'
  const filename = `${workDir}/tmp_picture.${mimeTypesToExtension[contentType]}`

  const buffer = await response.buffer()
  await fs.writeFile(filename, buffer)

  return { filename, isGif }
}
