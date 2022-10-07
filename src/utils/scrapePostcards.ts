import fetch from 'node-fetch'

const apiURL = 'https://api.otkritkiok.ru/v0/postcards/get-by'
async function scrape(start: number, iterations: number) {
  const limit = 50
  for (let i = 0; i < iterations; i++) {
    const query = new URLSearchParams({
      fullSlug: 'ejednevnie/dobroe-utro',
      page: String(i),
      limit: String(limit)
    })
    const responseRaw = await fetch(`${apiURL}?${query}`, {
      headers: {'token': 'ookgroup'}
    })
    type OtkritkiOkResponse = { data: { postcards: { image: string }[] } }
    const response = await responseRaw.json() as OtkritkiOkResponse
    const postcards = response.data.postcards.map(postcard => `https://cdn.otkritkiok.ru/posts/big/${postcard.image}`)
    console.log(postcards.join('\n'))
  }
}

console.log('\n\n')
await scrape(0, 10)
console.log('\n\n')
