import React from 'react'
import logo from './logo.jpg'
import { Link } from 'react-router-dom'
export default function Footer() {
  return (
    <div className=' mt-5 p-5 text-light bg-dark'>

      <div className='row'>
        {/**-------------------1------------------ */}
        <div className='col-3 col-sm-3 col-md-3 col-lg-3'>
          <div className='row'>
            <div className='col-12 col-sm-12 col-md-12 col-lg-12'>
              <Link to='/' className='navbar-brand nav-link ms-5 p-0 m-0'>
                <img src='images/LOGOPFE1.png' width='80px' height='auto' className='rounded p-0 m-0 bg-light' style={{ boxShadow: '3px 3px 20px light' }} />
              </Link>
              </div>
          </div>
          <div className='row'>
            <div className='col-12 col-sm-12 col-md-12 col-lg-12'>
              <p style={{ color: '#C6C6C6', fontSize: '0.9vw' }} className='mt-2 w-100 p-0 m-0'>If you have any question, please contact us at </p>
            </div>
          </div>
          <div className='row'>
            <div className='col-12 col-sm-12 col-md-12 col-lg-12 '>
              <p className='text-danger w-100 ' style={{ fontSize: '0.9vw' }}>zakaria@gmail.com</p>
            </div>
          </div>
          <div className='row'>
            <div className='col-12 col-sm-12 col-md-12 col-lg-12'>
              <p className='w-100' style={{ fontSize: '1vw' }}>(+212) 617 78 06 20</p>
            </div>
          </div>
          <div className='row'>
            <div className='col-12 col-sm-12 col-md-12 col-lg-12'>
              <p className='w-100' style={{ fontSize: '1vw' }}>Text Me On Whatsap for Help !</p>
            </div>
          </div>
          <div className='row'>
            <div className='col-12 col-sm-12 col-md-12 col-lg-12 w-50'>
              <div className='row'>
                <div className='col-4 col-sm-4 col-md-4 col-lg-4'>
                 <a href='https://www.instagram.com/'> <i class="bi bi-instagram p-2  text-light w-100" style={{ fontSize: '2vw' }}></i></a>
                </div>
                <div className='col-4 col-sm-4 col-md-4 col-lg-4'>
                  <i class="bi bi-whatsapp p-2  text-light w-100" style={{ fontSize: '2vw' }}></i>
                </div>
                <div className='col-4 col-sm-4 col-md-4 col-lg-4'>
                 <a href='https://www.facebook.com/'> <i class="bi bi-facebook p-2  text-light w-100" style={{ fontSize: '2vw' }}></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        {/**-------------------2------------------ */}
        <div className='col-3 col-sm-3 col-md-3 col-lg-3'>
          <div className='row'>
            <div className='col-12 col-sm-12 col-md-12 col-lg-12'>
              <h6 className='w-100' style={{ fontSize: '1vw' }}>CATEGORIES</h6>
            </div>
            <div className='col-12 col-sm-12 col-md-12 col-lg-12'>
              <ul className='p-2 m-0 w-100' style={{ color: "#C6C6C6", listStyleType: 'none', fontSize: '0.9vw' }}>
                <li className='m-3 ms-0 w-100'>Gaming PC</li>
                <li className='m-3 w-100 ms-0'>Gaming Chairs</li>
                <li className='m-3 w-100 ms-0'>Motherboards</li>
                <li className='m-3 w-100 ms-0'>Mouse</li>
                <li className='m-3 w-100 ms-0'>Keyboards</li>
                <li className='m-3 w-100 ms-0'>Headsets</li>
              </ul>
            </div>
          </div>
        </div>
        {/**-------------------3------------------ */}
        <div className='col-3 col-sm-3 col-md-3 col-lg-3'>
          <div className='row'>
            <div className='col-12 col-sm-12 col-md-12 col-lg-12'>
              <h6 className='w-100' style={{ fontSize: '1vw' }}>Shipping informations</h6>
            </div>
          </div>
          <div className='row'>
            <div className='col-12 col-sm-12 col-md-12 col-lg-12 '>
              <ul className='p-2 w-100 m-0' style={{ color: "#C6C6C6", fontSize: '0.9vw', listStyleType: 'none' }}>
                <li className='m-3 ms-0 w-100'>Text Me On Whatsap after order or before !​</li>
                <li className='m-3 w-100'>Shipping 48Hours (Morocco)</li>
                <li className='m-3 w-100'>Shipping Same Day (Tangier)</li>
                <li className='m-3 w-100'>1 Year garranty</li>
                <li className='m-3 w-100'>Only The best Brands</li>
              </ul>
            </div>
          </div>
        </div>


        {/**-------------------4------------------ */}
        <div className='col-3 col-sm-3 col-md-3 col-lg-3'>
          <div className='row'>
            <div className='col-12 col-sm-12 col-md-12 col-lg-12'>
              <h6 className='w-100' style={{ fontSize: '1vw' }}>NEWSLETTER</h6>
            </div>
          </div>

          <div className='row '>
            <div className='col-12 col-sm-12 col-md-12 col-lg-12 mt-4'>
              <input type='email' className='form-control p-2 w-100' placeholder='Your Email Adresse' style={{ backgroundColor: '#514F4F', fontSize: "0.9vw" }} />
            </div>
          </div>
          <div className='row'>
            <div className='col-12 col-sm-12 col-md-12 col-lg-12  text-center mt-4'>
              <button className='btn w-50 ' style={{ backgroundColor: '#13E0A3' }}><i class="bi bi-search"></i></button>
            </div>
          </div>
        </div>

      </div>




      {/**-------------------5------------------ */}
      <div className='row'>
        <div className='col-12 col-sm-12 col-md-12 col-lg-12 mt-2  p-0'>
          <hr className='w-100' />
        </div>
      </div>

      {/**-------------------6------------------ */}
      <div className='row'>
        <div className='col-12 col-sm-12 col-md-12 col-lg-12  '>
          <p className='ms-5 m-0' style={{ fontSize: '1vw' }}>© 2023 all rights recireved</p>
        </div>
      </div>


    </div>
  )
}
