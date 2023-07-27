import React, { useEffect, useState } from 'react'
import swal from 'sweetalert';
import { Link, useNavigate } from 'react-router-dom';
import './Promotion.css';
export default function Promotion() {
    const [data, setData] = useState([]);
    const [qte, setQte] = useState(1);
    const navigate=useNavigate()
    useEffect(() => {
        fetch('http://127.0.0.1:8000/api/produit')
            .then(res => res.json())
            .then(response => setData(response.produit))
    }, []);

    const add_to_cart = (produit_id) => {
        if (localStorage.getItem('auth_user') !== null) {
            const user = JSON.parse(localStorage.getItem('auth_user')).email;

            fetch('http://127.0.0.1:8000/api/panier', {
                method: "post",
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ user, produit_id, qte })
            }).then(res => res.json())
                .then(response => {
                    if (response.status == 201) {
                        swal('Success', response.message, 'success')
                        console.log(response)
                    }
                }

                )

        } else {
            navigate('/Login');
           // swal('Error', 'Login to add to cart', 'error')

        }


    }
    const [currentPage, setCurrentPage] = useState(1);
    const itemsPerPage = 4;
    const handleClickNext = () => {
        setCurrentPage(currentPage + 1);
    };

    const handleClickPrevious = () => {
        setCurrentPage(currentPage - 1);
    };

    // Calculate the index of the first and last items to display
    const lastIndex = currentPage * itemsPerPage;
    const firstIndex = lastIndex - itemsPerPage;

    // Slice the data array based on the calculated indices
    const paginatedData = data.filter((ele) => { return ele.promotion > 0 }).slice(firstIndex, lastIndex);

    return (

        <div className='p-4 bg-light mt-5 rounded rounded-3'>
            {/*------------------- title ------------------------------- */}
            <div className='row'>
                <div className='col-4 col-sm-4 col-lg-4 col-md-4'>
                    <h4 style={{ fontSize: "2vw" }}>Best Deals</h4>
                </div>
                <div className='col-4 col-sm-4 col-lg-4 col-md-4'></div>
                <div className='col-4 col-sm-4 col-lg-4 col-md-4 text-end' >

                    <p style={{ fontSize: "1.6vw" }}>تخفيضات <span> <button className='fa fa-chevron-circle-left m-2 btn' onClick={handleClickPrevious} disabled={currentPage === 1}></button>

                        <button className='fa fa-chevron-circle-right m-2 btn' onClick={handleClickNext} disabled={lastIndex > paginatedData.length}></button></span></p>

                </div>
            </div>
            {/*--------------- partie products -------------------------------- */}





            {/* -------------------------------------------------------------------------- */}
            {data.length > 0 &&
                <div className='row' >
                    {
                        paginatedData.map((ele) => {
                            return (
                                ele.promotion > 0 &&
                                <div className='col-12 col-sm-12 col-md-3 col-lg-3 bg-light mt-2'>
                                    <div class="card cart1 bg-light ">
                                        <Link to={`/Product_deatil/${ele.id}`}>
                                            {
                                                ele.image_id.length > 0 &&
                                                <img src={`http://127.0.0.1:8000/${ele.image_id[0].image}`} className='cart-img1' />
                                            }
                                            <div class="promotion-overlay1">{ele.promotion}% off</div>
                                        </Link>
                                        <ul class="social-media1">
                                            <li>
                                                <button className='btn text-light fw-bold' onClick={() => { add_to_cart(ele.id) }}>
                                                    Add to cart
                                                </button>
                                            </li>
                                        </ul>
                                        <div class="card-info1 cart-info1 d-flex">
                                            <p className="w-50 subtitle1">{ele.prix}</p>
                                            <p className='w-50 fw-bold '>
                                                <span>{(ele.prix - (ele.prix * ele.promotion / 100)).toFixed(2)}</span> dhs
                                            </p>
                                        </div>
                                    </div>
                                </div>


                            )
                        })

                    }
                </div>
            }


        </div>
    )
}
