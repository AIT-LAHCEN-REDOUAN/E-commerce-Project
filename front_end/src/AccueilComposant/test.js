import React, { useEffect, useState } from 'react'
import logo from '../Sections/logo.jpg'
import PaginatedItems from './PaginatedItems';
import swal from 'sweetalert';
import { Link } from 'react-router-dom';

export default function Promotion() {
    const [data, setData] = useState([]);
    const [qte, setQte] = useState(1);

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





            {data.length > 0 &&
                <div className='row' >
                   {
                        paginatedData.map((ele) => {
                            return (
                                ele.promotion > 0 &&
                                <div className='col-12 col-sm-12 col-lg-3 col-md-3 text-center p-2' style={{ boxShadow: '1px 0px lightgray' }}>
                                    {/* promo*/}
                                    <div className='row'>
                                        <div className='col-12 col-sm-12 col-lg-12 col-md-12'>
                                            <p className=' rounded rounded-5 bg-danger w-25 text-light fw-bold' style={{ fontSize: "1vw" }}>-{ele.promotion}%</p>
                                        </div>
                                    </div>

                                    {/* img*/}
                                    <div className='row'>
                                        <div className='col-12 col-sm-12 col-lg-12 col-md-12'>
                                            {
                                                ele.image_id.length > 0 &&
                                                <Link to={`/Product_deatil/${ele.id}`}> 
                                                 <img src={`http://127.0.0.1:8000/${ele.image_id[0].image}`} className='w-75 rounded rounded-5' />
                                                 </Link>
                                            }
                                            
                                        </div>
                                    </div>

                                    {/* categorie_product*/}
                                    {
                                    ele.type_id !== null &&
                                    <div className='row'>
                                        <div className='col-12 col-sm-12 col-lg-12 col-md-12'>
                                            <p className='text-start ms-2' style={{ color: "#817E7E", fontSize: "1.1vw" }}>{ele.type_id.type}</p>
                                        </div>
                                    </div> }

                                    {/* title_product*/}
                                    <div className='row'>
                                        <div className='col-12 col-sm-12 col-lg-12 col-md-12'>
                                            <p className='text-start ms-2 fw-bold ' style={{ fontSize: '1.1vw', color: "#403CFD" }}>{ele.title}</p>
                                        </div>
                                    </div>

                                    <div className='row '>
                                        {/* old_price*/}
                                        <div className='col-6 col-sm-6 col-lg-6 col-md-6'>
                                            <span className='' style={{ textDecoration: 'line-through', color: "#817E7E", fontSize: "1vw" }} >{ele.prix} DHs</span>
                                        </div>
                                        {/* new_price*/}
                                        <div className='col-6 col-sm-6 col-lg-6 col-md-6'>
                                            <span className='text-danger fw-bold' style={{ fontSize: "1.3vw" }}>{(ele.prix - (ele.prix * ele.promotion / 100)).toFixed(2)} DHs</span>
                                        </div>
                                    </div>
                                    {/* button*/}
                                    <div className='row'>
                                        <div className='col-12 col-sm-12 col-lg-12 col-md-12'>
                                            <button className='btn btn-dark text-light rounded rounded-5 p-1 w-50 mt-2 ' style={{ fontSize: "1.4vw" }} onClick={() => { add_to_cart(ele.id) }}>Add to cart</button>
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
