import React, { useEffect, useState } from 'react'
import Promotion from '../AccueilComposant/Promotion'
import BestProducts from '../AccueilComposant/BestProducts'
import Brands from '../AccueilComposant/Brands'
import Pub from '../AccueilComposant/Pub'
export default function Accueil() {





  return (
    <div className='container'>


      <div className='row '>
        <div className='col-12 col-sm-12 col-md-12 col-lg-12'>
          <p className='text-end mt-2 w-100'><i class="bi bi-truck" style={{ color: "#4971FF", fontSize: "15px" }}></i><span className='ms-3 fw-bold' style={{ fontSize: "13px" }}>الإرسال لجميع مدن المملكة</span></p>
        </div>
      </div>

      {/*---------------------publicite partie ------------------------*/}
      <Pub />

      <div className='row bg-light p-3 rounded rounded-3 mt-5'>

        {/*--------------1------------*/}
        <div className='col-3 col-sm-3 col-md-3 col-lg-3 r'>
          <div className='row '>
            <div className='col-8 col-sm-8 col-md-8 col-lg-8 '>
              <div className='row'>
                <div className='col-12 col-sm-12 col-md-12 col-lg-12'>
                  <h6 className='text-end fw-bold w-100' style={{ fontSize: '0.9vw' }}>FAST SHIPPING</h6>
                </div>
              </div>
              <div className='row'>
                <div className='col-12 col-sm-12 col-md-12 col-lg-12'>
                  <p style={{ fontSize: "0.7vw", color: "#787777" }} className='text-end w-100'>الإرسال لجميع المدن المغربية</p>
                </div>
              </div>
            </div>

            <div className='col-4 col-sm-4 col-md-4 col-lg-4'>
              <div className='row  '>
                <i class="fas fa-shipping-fast  w-100" style={{ color: "#4971FF", fontSize: '2.5vw' }} ></i>
              </div>
            </div>
          </div>
        </div>
        {/*------------------------- */}


        {/*-------------2-------------*/}
        <div className='col-3 col-sm-3 col-md-3 col-lg-3 justify-content-center'>
          <div className='row align-items-center '>
            <div className='col-8 col-sm-8 col-md-8 col-lg-8 '>
              <div className='row'>
                <div className='col-12 col-sm-12 col-md-12 col-lg-12'>
                  <h6 className='text-end fw-bold' style={{ fontSize: '0.9vw' }}>THE BEST QUALITY</h6>
                </div>
              </div>
              <div className='row'>
                <div className='col-12 col-sm-12 col-md-12 col-lg-12'>
                  <p style={{ fontSize: "0.7vw", color: "#787777" }} className='text-end'>ضمان الجودة لعام كامل</p>
                </div>
              </div>
            </div>

            <div className='col-4 col-sm-4 col-md-4 col-lg-4'>
              <i class="fas fa-award " style={{ color: "#4971FF", fontSize: '2.5vw' }}></i>
            </div>
          </div>
        </div>
        {/*------------------------- */}


        {/*------------3--------------*/}
        <div className='col-3 col-sm-3 col-md-3 col-lg-3 justify-content-center'>
          <div className='row align-items-center'>
            <div className='col-8 col-sm-8 col-md-8 col-lg-8 '>
              <div className='row'>
                <div className='col-12 col-sm-12 col-md-12 col-lg-12'>
                  <h6 className='text-end fw-bold' style={{ fontSize: "0.9vw" }}>SECURE PAYMENT</h6>
                </div>
              </div>
              <div className='row'>
                <div className='col-12 col-sm-12 col-md-12 col-lg-12'>
                  <p style={{ fontSize: "0.7vw", color: "#787777" }} className='text-end'>الدفع عند الإستلام</p>
                </div>
              </div>
            </div>

            <div className='col-4 col-sm-4 col-md-4 col-lg-4'>
              <i class="far fa-handshake " style={{ color: "#4971FF", fontSize: '2.5vw' }}></i>
            </div>
          </div>
        </div>
        {/*------------------------- */}



        {/*-------------4-------------*/}
        <div className='col-3 col-sm-3 col-md-3 col-lg-3 '>
          <div className='row '>
            <div className='col-8 col-sm-8 col-md-8 col-lg-8 '>
              <div className='row r'>
                <div className='col-12 col-sm-12 col-md-12 col-lg-12'>
                  <h6 className='text-end fw-bold w-100' style={{ fontSize: "0.9vw" }}>(+212) 617 78 06 20</h6>
                </div>
              </div>
              <div className='row '>
                <div className='col-12 col-sm-12 col-md-12 col-lg-12'>
                  <p style={{ fontSize: "0.7vw", color: "#787777" }} className='text-end w-100'>أرسل أسئلتك</p>
                </div>
              </div>
            </div>

            <div className='col-4 col-sm-4 col-md-4 col-lg-4'>
              <i class="fab fa-whatsapp " style={{ color: "#4971FF", fontSize: '2.5vw' }}></i>
            </div>
          </div>
        </div>
        {/*------------------------- */}

      </div>

      {/*---------------------promotion partie ------------------------*/}
      <Promotion />

      <div className='row bg-lightrounded rounded-3 mt-5 '>
        <div className='col-12 col-sm-12 col-md-12 col-lg-12 '>
          <img src='images/slide-website-3.png' className='w-100 rounded' />
        </div>
      </div>

      {/*---------------------Best Products partie ------------------------*/}
      <BestProducts />
      {/*---------------------Best Prands partie ------------------------*/}
      <Brands />



     

    </div>

  )
}
