import path from 'path'
import { fileURLToPath } from 'url'
const __filename = fileURLToPath(import.meta.url.replace(/src\/workDir\.js$/, 'index.js'))
const __dirname = path.dirname(__filename.slice(0, -4))
export default __dirname
