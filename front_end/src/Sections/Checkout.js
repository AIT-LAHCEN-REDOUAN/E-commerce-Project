import React, { useEffect, useState } from 'react'
import ReactDOM from 'react-dom';
import './Checkout.css'
import swal from 'sweetalert';
import { useNavigate } from 'react-router';
export default function Checkout() {
    const [firstName, setFirstName] = useState('');
    const [lastName, setLastName] = useState('');
    const [phone, setPhone] = useState('');
    const [Address, setAddress] = useState('');
    const [City, setCity] = useState('');
    const [Zip, setZip] = useState('');
    const [errors, setErrors] = useState([]);
    const [panier, setPanier] = useState([]);
    const [mode_payment, setMode_payment] = useState('');
    const navigate = useNavigate();
    const user_id = JSON.parse(localStorage.getItem('auth_user')).id
        const user_email = JSON.parse(localStorage.getItem('auth_user')).email
    var total = 0
    const [status, setStatus] = useState(false)
    useEffect(() => {
        if (localStorage.getItem('auth_user') !== null) {
            const user = JSON.parse(localStorage.getItem('auth_user')).email;
            fetch(`http://127.0.0.1:8000/api/panier/${user}`)
                .then(res => res.json())
                .then(response => {
                    setPanier(response.panier);
                    setStatus(true)
                }
                )
        } else {
            setStatus(false)
        }
    }, [])




    const PayPalButton = window.paypal.Buttons.driver("react", { React, ReactDOM });
    //paypal-code
    const commande_data = { firstName, lastName, phone, Address, City, Zip, user_id, user_email,payment_mode:'Paypal',payment_id:'' };
    const createOrder = (data,actions) => {
        // Order is created on the server and the order id is returned
        return actions.order.create({
            purchase_units:[
                {
                    amount:{
                        value:total
                    },
                },
            ],
        });
    };
    const onApprove = (data,actions) => {
        // Order is captured on the server 
        return actions.order.capture().then(function(details){
            console.log(details);
            commande_data.payment_id=details.id;
            fetch(`http://127.0.0.1:8000/api/Checkout`, {
                    method: "post",
                    headers: {
                        'accept': 'application/json',
                        'Content-Type': "application/json"
                    },
                    body: JSON.stringify(commande_data)
                })
                    .then(res => res.json())
                    .then(response => {
                        if (response.status == 200) {
                            swal('Success', response.message, 'success')
                            setErrors([])
                            navigate('/')
                        } else if (response.status == 422) {
                            setErrors(response.errors)
                        }
                    }
                    )
        });
    };

    //end-paypal-code
    const commander = (e, modePayment) => {
        e.preventDefault();
        
        const data = { firstName, lastName, phone, Address, City, Zip, user_id, user_email,payment_mode:modePayment,payment_id:'' };

        switch (modePayment) {
            case 'cod':
                fetch(`http://127.0.0.1:8000/api/Checkout`, {
                    method: "post",
                    headers: {
                        'accept': 'application/json',
                        'Content-Type': "application/json"
                    },
                    body: JSON.stringify(data)
                })
                    .then(res => res.json())
                    .then(response => {
                        if (response.status == 200) {
                            swal('Success', response.message, 'success')
                            setErrors([])
                            navigate('/')
                        } else if (response.status == 422) {
                            setErrors(response.errors)
                        }
                    }
                    )
                break;


            case 'paypal':
                fetch(`http://127.0.0.1:8000/api/Checkout_validation`, {
                    method: "post",
                    headers: {
                        'accept': 'application/json',
                        'Content-Type': "application/json"
                    },
                    body: JSON.stringify(data)
                })
                    .then(res => res.json())
                    .then(response => {
                        if (response.status == 200) {
                           // swal('Success', response.message, 'success')
                            setErrors([])
                            // navigate('/')


                            const myModal = new window.bootstrap.Modal('#paypalmodal')
                            myModal.show();
                        } else if (response.status == 422) {
                            setErrors(response.errors)
                        }
                    }
                    )

                break;
        }


    }
    return (
        <div class="container cont">

            <div class="row mt-5">
                <div class="col-md-4 order-md-2 mb-4">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Your cart</span>
                        <span class="text-danger fw-bold">{panier.length}</span>
                    </h4>
                    <ul class="list-group mb-3 sticky-top">
                        {
                            panier.map((ele) => {
                                total += parseFloat(ele.quantity) * parseFloat(ele.produit_id.prix).toFixed(2)
                                return (
                                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                                        <img src={`http://127.0.0.1:8000/${ele.produit_id.image_id[0].image}`} width='70' />
                                        <div>
                                            <h6 class="my-0 position-relative">{ele.produit_id.title}</h6>
                                            <span class="position-absolute top-0 start-0 translate-middle p-2 bg-success border border-light rounded-circle text-light fw-bold">
                                                {ele.quantity}
                                            </span>
                                            <small class="text-muted">{ele.produit_id.categorie_id.categorie}</small>
                                        </div>
                                        <span class="text-muted">{parseFloat(ele.quantity) * parseFloat(ele.produit_id.prix).toFixed(2)}</span>
                                    </li>
                                )
                            })
                        }



                        <li class="list-group-item d-flex justify-content-between fw-bold">
                            <span>Total (MAD)</span>
                            <strong>dhs {total}</strong>
                        </li>
                    </ul>

                </div>
                <div class="col-md-8 order-md-1">
                    <h4 class="mb-3">Billing address</h4>
                    <form class="needs-validation" novalidate="">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="firstName">First name</label>
                                <input type="text" class="form-control" id="firstName" placeholder="" value={firstName} onChange={(e) => { setFirstName(e.target.value) }} required="" />
                                <div class="text-danger"> {errors.firstName} </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="lastName">Last name</label>
                                <input type="text" class="form-control" id="lastName" placeholder="" value={lastName} onChange={(e) => { setLastName(e.target.value) }} required="" />
                                <div class="text-danger"> {errors.lastName} </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="username">Phone</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="phone" placeholder="phone" value={phone} onChange={(e) => { setPhone(e.target.value) }} required="" />
                                <div class="text-danger" style={{ width: '100%' }}> {errors.phone} </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" placeholder="Address" value={Address} onChange={(e) => { setAddress(e.target.value) }} required="" />
                            <div class="text-danger">{errors.Address} </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="state">City</label>
                                <select class="custom-select d-block w-100 form-control" id="state" required="" onChange={(e) => { setCity(e.target.value) }}>
                                    <option value="Agadir">Agadir</option>
                                    <option value="Al Hoceima">Al Hoceima</option>
                                    <option value="Azilal">Azilal</option>
                                    <option value="Beni Mellal">Beni Mellal</option>
                                    <option value="Ben Slimane">Ben Slimane</option>
                                    <option value="Boulemane">Boulemane</option>
                                    <option value="Casablanca">Casablanca</option>
                                    <option value="Chaouen">Chaouen</option>
                                    <option value="El Jadida">El Jadida</option>
                                    <option value="El Kelaa des Sraghna">El Kelaa des Sraghna</option>
                                    <option value="Er Rachidia">Er Rachidia</option>
                                    <option value="Essaouira">Essaouira</option>
                                    <option value="Fes">Fes</option>
                                    <option value="Figuig">Figuig</option>
                                    <option value="Guelmim">Guelmim</option>
                                    <option value="Ifrane">Ifrane</option>
                                    <option value="Kenitra">Kenitra</option>
                                    <option value="Khemisset">Khemisset</option>
                                    <option value="Khenifra">Khenifra</option>
                                    <option value="Khouribga">Khouribga</option>
                                    <option value="Laayoune">Laayoune</option>
                                    <option value="Larache">Larache</option>
                                    <option value="Marrakech">Marrakech</option>
                                    <option value="Meknes">Meknes</option>
                                    <option value="Nador">Nador</option>
                                    <option value="Ouarzazate">Ouarzazate</option>
                                    <option value="Oujda">Oujda</option>
                                    <option value="Rabat-Sale">Rabat-Sale</option>
                                    <option value="Safi">Safi</option>
                                    <option value="Settat">Settat</option>
                                    <option value="Sidi Kacem">Sidi Kacem</option>
                                    <option value="Tangier">Tangier</option>
                                    <option value="Tan-Tan">Tan-Tan</option>
                                    <option value="Taounate">Taounate</option>
                                    <option value="Taroudannt">Taroudannt</option>
                                    <option value="Tata">Tata</option>
                                    <option value="Taza">Taza</option>
                                    <option value="Tetouan">Tetouan</option>
                                    <option value="Tiznit">Tiznit</option>
                                </select>
                                <div class="text-danger"> {errors.City} </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="zip">Zip</label>
                                <input type="text" class="form-control" id="zip" placeholder="Zip" value={Zip} onChange={(e) => { setZip(e.target.value) }} required="" />
                                <div class="text-danger"> {errors.Zip} </div>
                            </div>
                        </div>

                        <hr class="mb-4" />
                        <h4 class="mb-3">Payment</h4>
                        <div class="d-block my-3">
                            <div class="custom-control custom-radio">
                                <input id="cod" name="paymentMethod" type="radio" class="custom-control-input" required="" value='cod' onChange={(e) => { setMode_payment(e.target.value) }} />
                                <label class="custom-control-label" for="paypal">Cash On delivery</label>
                            </div>
                            
                            <div class="custom-control custom-radio">
                                <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required="" value='paypal' onChange={(e) => { setMode_payment(e.target.value) }} />
                                <label class="custom-control-label" for="paypal">PayPal</label>
                            </div>
                        </div>

                        <button class="btn btn-primary btn-lg btn-block" type="submit" onClick={(e) => { commander(e, mode_payment) }}>Continue to checkout</button>
                    </form>
                </div>
            </div>


            {/*MODAL */}
            <div class="modal fade" id="paypalmodal" tabindex="-1" aria-labelledby="paypalmodal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="paypalmodal">Online Payment mode</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <hr />
                            <PayPalButton
                                createOrder={(data,actions) => createOrder(data, actions)}
                                onApprove={(data,actions) => onApprove(data, actions)}
                            />
                        </div>

                    </div>
                </div>
            </div>


        </div>
    )
}
