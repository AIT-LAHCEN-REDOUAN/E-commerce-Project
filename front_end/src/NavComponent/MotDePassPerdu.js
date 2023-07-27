import React from 'react'

export default function MotDePassPerdu() {
  return (
    <div className='bg-light text-center p-3 m-auto mt-5 w-25 container' >
    <div className='row'>
        <div className='col-12 col-sm-12 col-md-12 col-lg-12'>
        <p style={{ color: '#0266FD', fontSize: '25px' }} className="fw-bold w-100">Mot de Passe Perdu </p>
        </div>
    </div>
    <div className='row'>
        <div className='col-12 col-sm-12 col-md-12 col-lg-12'>
        <input type='email' className='form-control m-auto mt-3 w-75' placeholder='Email'  />
        </div>
    </div>
    <div className='row'>
        <div className='col-12 col-sm-12 col-md-12 col-lg-12'>
        <button className='btn  text-light fw-bold mt-4 w-75' style={{ backgroundColor: '#FF6F0C'}}>Recuperer</button>
        </div>
    </div>
 



</div>
  )
}
