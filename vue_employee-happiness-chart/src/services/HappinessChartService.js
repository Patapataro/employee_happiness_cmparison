export async function getAll() {
    const response = await fetch('http://localhost:8000/get');
    return await response.json();

    // fetch('/api/get')
    // .then(response => {
    //     if (!response.ok) {
    //     throw new Error('Network response was not ok');
    //     }
    //     return response.text();
    // })
    // .then(text => {
    //     // parse response to json
    //     try {
    //     return JSON.parse(text);
    //     } catch (err) {
    //     console.error('Failed to parse JSON:', text);
    //     throw err;
    //     }
    // })
    // .then(data => {
    //     // Handle the parsed data
    //     return data
    // })
    // .catch(error => {
    //     console.error('Fetch error:', error);
    // });
}

export async function edit(data) {
    const response = await fetch(`/api/edit`, {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({user: data})
      })
    return await response.json();
}