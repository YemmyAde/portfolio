// const stripe = Stripe("pk_live_51JX66lADIz0KikRTMsM4OTxBNJjYxe0MAxleUQrywLk7RGeCvjgaRBLuX42noHdIHh4lLlFJRdAOB7018To36wyX00pYImKcVX")
// const btn = document.querySelector('#first_sec')
// btn.addEventListener('click', ()=>{
//     fetch('/checkout.php',{
//         method:"POST",
//         headers:{
//             'Content-Type' : 'application/json',
//         },
//         body: JSON.stringify({})
//     }).then(res=> res.json())
//         .then(payload => {
//             // console.log(payload)
//
//            stripe.redirectToCheckout({sessionId: payload.id})
//         })
// })