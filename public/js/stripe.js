console.log('hhhhh')
window.onload = () => {
    // Variables

    let stripe = Stripe('pk_test_51HQB05ATKGMnwbpsuupWGKBMmA7VnbzevDIo3ZF2C0KJSGdgoZV0xCqe4UQVXM5JI34PnLMttKV00LXpwbgFasWu004nSaK9K0');
    let elements = stripe.elements();
    let redirect = '/'


    // Objets de la page

    let cardHolderName = document.getElementById("cardholder-name")
    let cardButton = document.getElementById("card-button")
    let clientSecret =cardButton.dataset.secret;

    // Crée les elements du formulaire de carte bancaire
    let card = elements.create("card");
    card.mount("#card-elements");

    // On Gère la saisie (erreur etc)

    card.addEventListener('change' , (event) => {
        let displayError = document.getElementById("card-errors");
        if(event.error) {
            displayError.textContent = event.error.message;
        }else {
            displayError.textContent = '';
        }
        })

    // On gère le paiement
    cardButton.addEventListener('click', () => {
        stripe.handleCardPayment(
            clientSecret, card , {
                payment_method_data: {
                    billing_details: {
                        name : cardHolderName.value
                    }
                }
            }
        ).then((result) => {
            if(result.error) {
                console.log(result.error.message)
                document.getElementById('errors').innerText = result.error.message;
            }else {
                document.location.href = redirect
            }
        })
    })

}