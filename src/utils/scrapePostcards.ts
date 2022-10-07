import fetch from 'node-fetch'

const apiURL = 'https://api.otkritkiok.ru/v0/postcards/get-by'
async function scrape(start, iterations) {
  for (let i = 0; i < iterations; i++) {
    const query = new URLSearchParams({
      fullSlug: 'ejednevnie/dobroe-utro',
      page: i,
      limit: 50
    })
    let responseRaw = await fetch(`${apiURL}?${query}`, {
      headers: {'token': 'ookgroup'}
    })
    let response = await responseRaw.json()
    let postcards = response.data.postcards.map(postcard => `https://cdn.otkritkiok.ru/posts/big/${postcard.image}`)
    console.log(postcards.join('\n'))
  }
}

console.log('\n\n')
await scrape(0, 10)
console.log('\n\n')
