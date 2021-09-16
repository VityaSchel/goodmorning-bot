import * as fs from 'fs'
import workDir from './workDir.js'
import readConfig from 'src/readConfig.js'

export default function getPicture() {
  const config = readConfig()
  const fixedImage = config.fixedImage
  if(fixedImage) {
    return fixedImage
  } else {
    return readFirstPicture()
  }
}

function readFirstPicture() {
  const config = readConfig()
  const picturesList = fs.readFileSync(`${workDir}/config/pictures.txt`, 'utf-8')
  const picturesLinks = picturesList.split(/\n/g).filter(String)

  const usedLink = picturesLinks.shift()
  fs.writeFileSync(`${workDir}/pictures.txt`, picturesLinks.join('\n'))
  if(!config.removeUsed) fs.appendFileSync(`${workDir}/used.txt`, `${usedLink}\n`)

  return usedLink
}
