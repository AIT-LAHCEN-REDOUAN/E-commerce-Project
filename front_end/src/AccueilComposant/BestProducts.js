import React, { useEffect, useState } from 'react'
import logo from '../Sections/logo.jpg'
import Slider from 'react-slick';
import 'slick-carousel/slick/slick.css';
import 'slick-carousel/slick/slick-theme.css';
export default function BestProducts() {
    const photos = [
        {
            id: 1,
            url: '/images/bestproducts/asusrog-monitor_300x.png',
            caption: 'Photo 1',
        },
        {
            id: 2,
            url: '/images/bestproducts/carte-graphique_300x.png',
            caption: 'Photo 2',
        },
        {
            id: 3,
            url: '/images/bestproducts/cartemere_300x.png',
            caption: 'Photo 3',
        },
        {
            id: 4,
            url: '/images/bestproducts/clavier_300x.png',
            caption: 'Photo 4',
        },
        {
            id: 5,
            url: '/images/bestproducts/pc-gamer_300x.png',
            caption: 'Photo 4',
        },
        {
            id: 6,
            url: '/images/bestproducts/pc-portable_300x.png',
            caption: 'Photo 4',
        },
        {
            id: 7,
            url: '/images/bestproducts/processeur_300x.png',
            caption: 'Photo 4',
        },
        {
            id: 8,
            url: '/images/bestproducts/souris_300x.png',
            caption: 'Photo 4',
        }
    ];


    const CustomPrevArrow = ({ onClick }) => (
        <a id='prev_btn' onClick={onClick} className="custom-arrow" style={{ color: 'black' }}>
             <i className='fa fa-chevron-circle-right m-2 btn'></i>
        </a>
    );

    const CustomNextArrow = ({ onClick }) => (
        <a onClick={onClick} id='next_btn' className="custom-arrow" style={{ color: 'black' }}>
            <i className='fa fa-chevron-circle-left m-2 btn'></i>
           
        </a>
    );

    const settings = {
        dots: false,
        infinite: true,
        speed: 1000,
        slidesToShow: 3,
        slidesToScroll: 1,
        centerMode: true,
        autoplay: true,
        autoplaySpeed: 2500,
        prevArrow: <CustomPrevArrow />,
        nextArrow: <CustomNextArrow />,
    };


    return (
      

        <div className='p-4 bg-light mt-5 rounded rounded-3'>
            {/*------------------- title ------------------------------- */}
            <div className='row'>
                <div className='col-4 col-sm-4 col-lg-4 col-md-4'>
                    <h4 style={{ fontSize: '2.1vw' }}>Collections Populaires</h4>
                </div>
                <div className='col-4 col-sm-4 col-lg-4 col-md-4'></div>
                <div className='col-4 col-sm-4 col-lg-4 col-md-4 text-end' >

                    <p style={{ fontSize: '1.5vw' }}></p>

                </div>
            </div>
            {/*--------------- partie products -------------------------------- */}

            <div className='row'>
                <Slider {...settings}>
                    {photos.map(photo => (
                        <div key={photo.id}>
                            <img src={photo.url} alt={photo.caption}  width='300px' style={{borderRadius:'50%'}}/>
                        </div>
                    ))}
                </Slider>
            </div>




        </div>
    )
}
