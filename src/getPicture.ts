import * as fs from 'fs'
import readConfig from './readConfig.js'
import { dirname } from 'path'
import { fileURLToPath } from 'url'

const source = process.argv[2]

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
  const picturesList = fs.readFileSync(`${__dirname}../config/pictures_${source}.txt`, 'utf-8')
  const picturesLinks = picturesList.split(/\n/g).filter(String)

  const usedLink = picturesLinks.shift()
  if(!usedLink) throw 'No more pictures left in config/pictures.txt!'
  shiftLinksInFiles(usedLink, picturesLinks)

  return usedLink
}

function shiftLinksInFiles(usedLink: string, picturesLinks: string[]) {
  fs.writeFileSync(`${__dirname}../config/pictures_${source}.txt`, picturesLinks.join('\n'))
  if(!readConfig().removeUsed) fs.appendFileSync(`${__dirname}../config/used_${source}.txt`, usedLink + '\n')
}
