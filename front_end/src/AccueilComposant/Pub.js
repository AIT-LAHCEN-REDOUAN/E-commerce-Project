import React, { useEffect, useState } from 'react'
import logo from '../Sections/logo.jpg'
import Slider from 'react-slick';
import 'slick-carousel/slick/slick.css';
import 'slick-carousel/slick/slick-theme.css';
export default function Pub() {
    const photos = [
        {
            id: 1,
            url: '/images/slider-2.png',
            caption: 'Photo 1',
        },
        {
            id: 2,
            url: '/images/slider-3.png',
            caption: 'Photo 2',
        },
        {
            id: 3,
            url: '/images/slider-4.png',
            caption: 'Photo 3',
        },
        {
            id: 4,
            url: '/images/Design sans titre2.png',
            caption: 'Photo 4',
        },
        {
            id: 5,
            url: '/images/Design sans titre.png',
            caption: 'Photo 5',
        }
    ];


    const CustomPrevArrow = ({ onClick }) => (
        <a id='prev_btn' onClick={onClick} className="custom-arrow" style={{ color: 'black' }}>
            <i className='fa fa-chevron-circle-left m-2 btn'></i>
        </a>
    );

    const CustomNextArrow = ({ onClick }) => (
        <a onClick={onClick} id='next_btn' className="custom-arrow" style={{ color: 'black' }}>
            <i className='fa fa-chevron-circle-right m-2 btn'></i>
        </a>
    );

    const settings = {
       // dots: false,
        infinite: true,
        speed: 1000,
        slidesToShow:1,
        slidesToScroll: 1,
       // centerMode: true,
        autoplay: true,
        autoplaySpeed: 1000,
        prevArrow: <CustomPrevArrow />,
        nextArrow: <CustomNextArrow />,
    };


    return (
       

                <Slider {...settings} style={{marginTop:'-30px'}} clas>
                    {photos.map(photo => (
                        <div key={photo.id} >
                            <img src={photo.url} alt={photo.caption} width='100%' className='rounded rounded-5'height='500'/>
                        </div>
                    ))}
                </Slider>
       
    )
}
