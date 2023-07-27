import React, { useEffect, useState } from 'react'
export default function Brands() {

    const [marque,setMarque]=useState([]);
    useEffect(() => {
        fetch('http://127.0.0.1:8000/api/marque')
        .then(res => res.json())
        .then(response => setMarque(response)) 
        },[]);
    return (
        <div className='p-4 bg-light mt-5 rounded rounded-3 text-center'>
          
            <div className='row text-center justify-content-around align-items-center'>


                {/* ---item--1--- */}
                {
                marque.length>0 && 
                marque.map((ele)=>{
                    return(
                        <div className='col-2 col-sm-2 col-lg-2 col-md-2 text-center p-2' >
                            {/* img*/}
                            <img src={`http://127.0.0.1:8000/${ele.image}`} className='w-100' />
                            
                        </div>
                    )
                })
                         

                }
                
            </div>

            
 


        </div>
    )
}
