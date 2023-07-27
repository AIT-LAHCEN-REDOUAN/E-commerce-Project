import React, { useEffect, useState } from 'react'
export default function Stockage() {
    const [produit, setProduit] = useState([]);
    const [marque, setMarque] = useState([]);
    const [type, setType] = useState([]);
    const [brand, setBrand] = useState('');
    const [price, setPrice] = useState(0);
    const [min, setMin] = useState(0);
    const [max, setMax] = useState(0);
    useEffect(() => {
        fetch('http://127.0.0.1:8000/api/produit/Stockage')
            .then(res => res.json())
            .then(response => {
                setProduit(response.produit);
                setMin(response.min);
                setMax(response.max);
                // console.log(response);
            });

        fetch('http://127.0.0.1:8000/api/type/Stockage')
            .then(res => res.json())
            .then(response =>setType(response));
    }, []);
    return (
        <div className='container'>
            <div className='row'>
                <div className='col-3 col-sm-3 col-md-3 col-lg-3 mt-5'>
                    <div className='row'>
                        <div className='col-12 col-sm-12 col-md-12 col-lg-12'>
                            <div className='card rounded rounded-3 '>
                                <div className='card-header'>
                                    <h4 className='fw-bold m-1 p-1' style={{ fontSize: '1.2vw' }}>PRICE</h4>
                                </div>
                                <div className='card-body'>
                                    <button className='btn btn-warning fw-bold m-0 rounded rounded-5 btn-sm ' onClick={() => { setPrice(0) }}>X</button>
                                    <input type='range' className='form-range mt-3' min={min} max={max} onChange={(e) => { setPrice(e.target.value) }} />
                                    <label className='text-muted'>Range :{price} DHs</label>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div className='row'>
                        <div className='col-12 col-sm-12 col-md-12 col-lg-12 mt-5'>
                            <div className='card rounded rounded-3'>
                                <div className='card-header'>
                                    <h4 className='fw-bold m-1 p-1' style={{ fontSize: '1.2vw' }}>TYPES</h4>
                                </div>
                                <div className='card-body'>
                                    <button className='btn btn-warning fw-bold m-0 rounded rounded-5 btn-sm ' onClick={() => { setBrand('') }}>X</button>
                                    {
                                        type.map((ele,i) => {
                                            return (
                                                <div className='d-flex p-2 m-1' key={i}>
                                                    <input type='radio' name='brand' className='form-check-input m-1' value={ele.type} onClick={(e) => { setBrand(e.target.value) }} />
                                                    <label className='ms-2' style={{ fontSize: "1.1vw", fontWeight: "500" }}>{ele.type}</label>
                                                </div>
                                            )
                                        })
                                    }


                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div className='col-9 col-sm-9 col-md-9 col-lg-9 mt-5 '>
                    <div className='row justify-content-center'>
                        {

                            produit.length > 0 ?
                                (
                                    brand.length > 0 && price == 0 ?
                                        /* code block for brand > 0 and price == 0 */
                                        produit.filter((x) => {
                                            return x.marque_id.marque == brand
                                        }).map((ele,i) => {
                                            return (
                                                <div className='col-12 col-sm-12 col-md-3 col-lg-3 bg-light m-2' key={i}>
                                                    <div className='row p-0 m-0'>
                                                        <div className='col-12 col-sm-12 col-md-12 col-lg-12'>
                                                            {
                                                                ele.image_id.length > 0 &&
                                                                <img src={ele.image_id[0].image} className='w-100 p-1' />}

                                                        </div>
                                                    </div>

                                                    <div className='row p-0 m-0' style={{ lineHeight: "2px" }}>
                                                        <div className='col-12 col-sm-12 col-md-12 col-lg-12'>
                                                            <p className='w-100 text-muted' style={{ fontSize: "1vw" }}>{ele.marque_id.marque}</p>
                                                        </div>
                                                    </div>

                                                    <div className='row p-0 m-0 ' style={{ lineHeight: "20px" }}>
                                                        <div className='col-12 col-sm-12 col-md-12 col-lg-12'>
                                                            <p className='w-100' style={{ color: "#0348F9", fontSize: "1.1vw" }}> {ele.title} </p>
                                                        </div>
                                                    </div>

                                                    <div className='row p-0 m-0 ' style={{ lineHeight: "2px" }}>
                                                        <div className='col-12 col-sm-12 col-md-12 col-lg-12'>
                                                            <p className='w-100 ' style={{ fontSize: "1.2vw" }}><span>{ele.prix}</span> dhs</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            )
                                        })
                                        :
                                        (
                                            price > 0 && brand.length == 0 ?
                                                /* code block for price > 0 and brand == 0 */
                                                produit.filter((x) => {
                                                    return x.prix <= price
                                                }).map((ele,i) => {
                                                    return (
                                                        <div className='col-12 col-sm-12 col-md-3 col-lg-3 bg-light m-2' key={i}>
                                                            <div className='row p-0 m-0'>
                                                                <div className='col-12 col-sm-12 col-md-12 col-lg-12'>
                                                                    {
                                                                        ele.image_id.length > 0 &&
                                                                        <img src={ele.image_id[0].image} className='w-100 p-1' />}

                                                                </div>
                                                            </div>

                                                            <div className='row p-0 m-0' style={{ lineHeight: "2px" }}>
                                                                <div className='col-12 col-sm-12 col-md-12 col-lg-12'>
                                                                    <p className='w-100 text-muted' style={{ fontSize: "1vw" }}>{ele.marque_id.marque}</p>
                                                                </div>
                                                            </div>

                                                            <div className='row p-0 m-0 ' style={{ lineHeight: "20px" }}>
                                                                <div className='col-12 col-sm-12 col-md-12 col-lg-12'>
                                                                    <p className='w-100' style={{ color: "#0348F9", fontSize: "1.1vw" }}> {ele.title} </p>
                                                                </div>
                                                            </div>

                                                            <div className='row p-0 m-0 ' style={{ lineHeight: "2px" }}>
                                                                <div className='col-12 col-sm-12 col-md-12 col-lg-12'>
                                                                    <p className='w-100 ' style={{ fontSize: "1.2vw" }}><span>{ele.prix}</span> dhs</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    )
                                                })
                                                :
                                                (
                                                    price > 0 && brand.length > 0 ?
                                                        /* code block for price > 0 and brand > 0 */
                                                        produit.filter((x) => {
                                                            return x.marque_id.marque == brand && x.prix == price
                                                        }).map((ele,i) => {
                                                            return (
                                                                <div className='col-12 col-sm-12 col-md-3 col-lg-3 bg-light m-2' key={i}>
                                                                    <div className='row p-0 m-0'>
                                                                        <div className='col-12 col-sm-12 col-md-12 col-lg-12'>
                                                                            {
                                                                                ele.image_id.length > 0 &&
                                                                                <img src={ele.image_id[0].image} className='w-100 p-1' />}

                                                                        </div>
                                                                    </div>

                                                                    <div className='row p-0 m-0' style={{ lineHeight: "2px" }}>
                                                                        <div className='col-12 col-sm-12 col-md-12 col-lg-12'>
                                                                            <p className='w-100 text-muted' style={{ fontSize: "1vw" }}>{ele.marque_id.marque}</p>
                                                                        </div>
                                                                    </div>

                                                                    <div className='row p-0 m-0 ' style={{ lineHeight: "20px" }}>
                                                                        <div className='col-12 col-sm-12 col-md-12 col-lg-12'>
                                                                            <p className='w-100' style={{ color: "#0348F9", fontSize: "1.1vw" }}> {ele.title} </p>
                                                                        </div>
                                                                    </div>

                                                                    <div className='row p-0 m-0 ' style={{ lineHeight: "2px" }}>
                                                                        <div className='col-12 col-sm-12 col-md-12 col-lg-12'>
                                                                            <p className='w-100 ' style={{ fontSize: "1.2vw" }}><span>{ele.prix}</span> dhs</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            )
                                                        })
                                                        :
                                                        (
                                                            price == 0 && brand.length == 0 ?
                                                                /* code block for price == 0 and brand == 0 */
                                                                produit.map((ele,i) => {
                                                                    return (
                                                                        <div className='col-12 col-sm-12 col-md-3 col-lg-3 bg-light m-2' key={i}>
                                                                            <div className='row p-0 m-0'>
                                                                                <div className='col-12 col-sm-12 col-md-12 col-lg-12'>
                                                                                    {
                                                                                        ele.image_id.length > 0 &&
                                                                                        <img src={ele.image_id[0].image} className='w-100 p-1' />}

                                                                                </div>
                                                                            </div>

                                                                            <div className='row p-0 m-0' style={{ lineHeight: "2px" }}>
                                                                                <div className='col-12 col-sm-12 col-md-12 col-lg-12'>
                                                                                    <p className='w-100 text-muted' style={{ fontSize: "1vw" }}>{ele.marque_id.marque}</p>
                                                                                </div>
                                                                            </div>

                                                                            <div className='row p-0 m-0 ' style={{ lineHeight: "20px" }}>
                                                                                <div className='col-12 col-sm-12 col-md-12 col-lg-12'>
                                                                                    <p className='w-100' style={{ color: "#0348F9", fontSize: "1.1vw" }}> {ele.title} </p>
                                                                                </div>
                                                                            </div>

                                                                            <div className='row p-0 m-0 ' style={{ lineHeight: "2px" }}>
                                                                                <div className='col-12 col-sm-12 col-md-12 col-lg-12'>
                                                                                    <p className='w-100 ' style={{ fontSize: "1.2vw" }}><span>{ele.prix}</span> dhs</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    )
                                                                })
                                                                : null
                                                        )
                                                )
                                        )
                                )
                                : null










                        }



                    </div>
                </div>
            </div>
        </div>
    )
}
