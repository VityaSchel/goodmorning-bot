import * as fs from 'fs'
import readConfig from './readConfig.js'
import { dirname } from 'path'
import { fileURLToPath } from 'url'

const __dirname = dirname(fileURLToPath(import.meta.url)) + '/'

export default function getPicture() {
  const fixedImage = readConfig().fixedImage
  if(fixedImage) {
    return fixedImage
  } else {
    return readFirstPicture()
  }
}

function readFirstPicture() {
  const picturesList = fs.readFileSync(__dirname + '../config/pictures.txt', 'utf-8')
  const picturesLinks = picturesList.split(/\n/g).filter(String)

  const usedLink = picturesLinks.shift()
  shiftLinksInFiles(usedLink, picturesLinks)

  return usedLink
}

function shiftLinksInFiles(usedLink, picturesLinks) {
  fs.writeFileSync(`${workDir}/config/pictures.txt`, picturesLinks.join('\n'))
  if(!readConfig().removeUsed) fs.appendFileSync(`${workDir}/config/used.txt`, `${usedLink}\n`)
}
