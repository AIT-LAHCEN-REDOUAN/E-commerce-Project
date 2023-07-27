import React, { useState } from 'react'
import { useNavigate } from 'react-router';
export default function Contacter() {
    const [nom,setNom]=useState('');
    const [prenom,setPrenom]=useState('');
    const [email,setEmail]=useState('');
    const [message,setMessage]=useState('');
    const navigate=useNavigate();
    const handleSubmit = (e) => {
        e.preventDefault();
fetch( 'http://127.0.0.1:8000/api/message', {
    method:'post',
    /* headers are important*/
    headers: {
      'Accept': 'application/json',
      'Content-Type': 'application/json'
    },
    
    body: JSON.stringify({nom,prenom,email,message})
})
.then(response => {
    return response.json();
}) 
.then( data => {
    alert(data.message);
})
//props.getCategories();
    };
    return (
        <div className='container text-center py-5  '>
            <div className='row'>
                <div className='col-12 col-sm-12 col-md-12 col-lg-12 text-center ' >
                    <h4 style={{color:'#1288F4'}} className='fw-bold'>Contact</h4>
                </div>
            </div>
            <form onSubmit={handleSubmit}>
            <div className='row mt-3  w-75 justify-content-center mx-auto '>
                <div className='col-6 col-sm-6 col-md-6 col-lg-6 ' >
                    <input type='text' placeholder='Votre Nom' className='py-2 form-control  ' onChange={(e)=>{setNom(e.target.value)}}/>
                </div>
                
                <div className='col-6 col-sm-6 col-md-6 col-lg-6'>
                    <input type='text' placeholder='Votre Prenom' className='py-2 form-control' onChange={(e)=>{setPrenom(e.target.value)}}/>
                </div>
            </div>
            <div className='row w-75 justify-content-center mx-auto '>
                <div className='col-21 col-sm-12 col-md-12 col-lg-12' >
                <input type='email' placeholder='Votre Email' className='form-control py-2' style={{marginTop:'35px'}} onChange={(e)=>{setEmail(e.target.value)}}/>
                </div>

            </div>
            <div className='row w-75  justify-content-center mx-auto '>
                <div className='col-21 col-sm-12 col-md-12 col-lg-12 ' >
                    <textarea placeholder='Votre Message' className='form-control mx-auto'  rows='5' style={{marginTop:'35px'}} onChange={(e)=>{setMessage(e.target.value)}}></textarea><br></br>
                </div>

            </div>
            <div className='row'>
                <div className='col-md-12   ' >

                    <button className='btn text-light fw-bold py-2' style={{backgroundColor:"#FF6F0C",width:'200px'}} type='submit'>Envoyer</button>
                </div>

            </div>
            </form>



        </div>
    )
}
