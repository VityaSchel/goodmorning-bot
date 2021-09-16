import * as fs from 'fs'
import workDir from './workDir.js'

export default function readConfig() {
  const envContents = fs.readFileSync(`${workDir}/.env`, 'utf-8')
  envContents.split(/\n/g).forEach(line => {
    const [key, val] = line.split('=')
    process.env[key] = val
  })
  let botConfig = fs.readFileSync(`${workDir}/config.json`, 'utf-8')
  try {
    botConfig = JSON.parse(botConfig)
  } catch(e) {
    throw `Couldn't parse JSON in config bot.json: ${e.message}`
  }
  return botConfig
}
