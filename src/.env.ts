import dotenv from 'dotenv'
import { dirname } from 'path'
import { fileURLToPath } from 'url'

const __dirname = dirname(fileURLToPath(import.meta.url)) + '/'
dotenv.config({ path: __dirname + '../.env' })
if(!process.env.VK_API_ACCESS_TOKEN) throw 'VK_API_ACCESS_TOKEN not found in .env file'