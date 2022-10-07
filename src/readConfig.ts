import * as fs from 'fs'
import { dirname } from 'path'
import { fileURLToPath } from 'url'

const __dirname = dirname(fileURLToPath(import.meta.url)) + '/'

interface BotConfig {
  removeUsed: boolean
  paused: boolean
  fixedImage: null | string
  vkPeerID: string
}

export default function readConfig(): BotConfig {
  try {
    return JSON.parse(fs.readFileSync(__dirname + '../config/bot.json', 'utf-8'))
  } catch(e) {
    console.error('Couldn\'t parse JSON in config bot.json')
    throw e
  }
}
