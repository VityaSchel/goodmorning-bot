import fetch from 'node-fetch'
import * as fs from 'fs'
import workDir from './workDir.js'

export default async function downloadImage(url) {
  const filename = `${workDir}/tmp_picture`
  const response = await fetch(url)

  const contentType = response.headers.get('content-type')
  const isGif = contentType === 'image/gif'

  const buffer = await response.buffer()
  await fs.writeFile(filename, buffer)

  return { filename, isGif }
}
