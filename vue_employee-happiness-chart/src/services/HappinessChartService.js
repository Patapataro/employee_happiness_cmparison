export const HappinessChartService = {
    "URL": "http://localhost:8000",

    "getAll": async function() {
        const response = await fetch(this.URL+'/get');
        return await response.json();
    },

    "edit": async function edit(data) {
        const response = await fetch(this.URL+'/post', {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({graph: data})
        })
        return await response.json();
    }
}
