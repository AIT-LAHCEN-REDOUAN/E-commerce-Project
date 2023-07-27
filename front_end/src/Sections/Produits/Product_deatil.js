import React, { useEffect, useState } from 'react'
import { Link, useParams, useNavigate } from 'react-router-dom';
import './Product_detail.css'
import swal from 'sweetalert';
export default function Product_deatil() {
    var { id } = useParams();
    let navigate = useNavigate();
    const [produit, setProduit] = useState();
    const [qte, setQte] = useState(1);
    useEffect(() => {
        fetch(`http://127.0.0.1:8000/api/detail/${id}`)
            .then(res => res.json())
            .then(response => {
                setProduit(response.produit)

            });
    }, [])


    const add_to_cart = (produit_id) => {
        if (localStorage.getItem('auth_user') !== null) {
            const user = JSON.parse(localStorage.getItem('auth_user')).email;

            fetch('http://127.0.0.1:8000/api/panier', {
                method: "post",
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({user,produit_id,qte})
            }).then(res => res.json())
                .then(response => {
                    if (response.status == 201) {
                        swal('Success', response.message, 'success')
                        console.log(response)
                    } 
                }

                )

        } else {
           
                swal('Error','Login to add to cart', 'error')
       
        }


    }

    function change_image(image) {
        var container = document.getElementById("main-image");
        container.src = image;
    }
    return (
        <div class="container mt-5 mb-5">

            {produit &&
                <div class="row d-flex justify-content-center">
                    <div class="col-md-10">
                        <div class="card">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="images p-3">
                                        <div class="text-center p-4">
                                            {
                                                produit.image_id.length > 0 &&
                                                <img id="main-image" src={`http://127.0.0.1:8000/${produit.image_id[0].image}`} width="100%" />
                                            }

                                        </div>
                                        <div class="thumbnail text-center">
                                            {
                                                produit.image_id.length > 0 &&
                                                produit.image_id.map((ele) => {
                                                    return (
                                                        <img onClick={(e) => { change_image(e.target.src) }} src={`http://127.0.0.1:8000/${ele.image}`} width="100" />
                                                    )
                                                })
                                            }
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="product p-4">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <Link class="d-flex align-items-center btn" onClick={() => { navigate(-1) }}> <i class="fa fa-long-arrow-left"></i> <span class="ml-1">Back</span> </Link> <i class="fa fa-shopping-cart text-muted"></i>
                                        </div>
                                        <div class="mt-4 mb-3"> <span class="text-uppercase text-muted brand">{produit.marque_id.marque}</span>
                                            <h5 class="text-uppercase">{produit.title}</h5>
                                            <div class="price d-flex flex-row align-items-center">
                                                <span class="act-price">{produit.prix} DHs</span>
                                            </div>
                                        </div>
                                        <p class="about">{produit.description}</p>
                                        <div class="sizes mt-5">
                                            <h6 class="text-uppercase">Quantity</h6>
                                            <input type='number' className='w-25' min='0' value={qte} onChange={(e) => { setQte(e.target.value) }} />
                                        </div>
                                        <div class=" mt-4 align-items-center">
                                            <button class="btn btn-danger text-uppercase mr-2 px-4" onClick={() => { add_to_cart(produit.id) }}>Add to cart</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            }
        </div>
    )
}
