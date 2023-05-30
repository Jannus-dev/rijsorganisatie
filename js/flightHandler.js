function authorize() {
  const url = "https://test.api.amadeus.com/v1/security/oauth2/token";

  const clientId = "0BnyJihBAM2c9R6Es9mwMraoXLhOCzld";

  const clientSecret = "MYZaN9Q5eXkhsc1N";

  const data = new URLSearchParams();

  data.append("grant_type", "client_credentials");

  data.append("client_id", clientId);

  data.append("client_secret", clientSecret);

  fetch(url, {
    method: "POST",

    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },

    body: data,
  })
    .then((response) => response.json())

    .then((data) => {
      var token = data.access_token;
      console.log(token);
    })

    .catch((error) => console.error(error));
}
