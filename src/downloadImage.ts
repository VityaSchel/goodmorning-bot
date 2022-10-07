import fetch from 'node-fetch'
import fs from 'fs/promises'
import { dirname } from 'path'
import { fileURLToPath } from 'url'

const __dirname = dirname(fileURLToPath(import.meta.url)) + '/'

const mimeTypesToExtension = {
  'image/gif': 'gif',
  'image/jpeg': 'jpg',
  'image/jpg': 'jpg',
  'image/png': 'png'
}

export default async function downloadImage(url: string) {
  const response = await fetch(url)

  const contentTypeHeader = response.headers.get('content-type')
  if(contentTypeHeader === null) throw 'Couldn\'t detect mime type'
  if(!(contentTypeHeader in mimeTypesToExtension)) throw 'Unknown mime type'
  const contentType: keyof typeof mimeTypesToExtension = contentTypeHeader as keyof typeof mimeTypesToExtension
  const isGif = contentType === 'image/gif'
  const filename = __dirname + `/tmp_picture.${mimeTypesToExtension[contentType]}`

  const buffer = await response.buffer()
  await fs.writeFile(filename, buffer)

  return { filename, isGif }
}
