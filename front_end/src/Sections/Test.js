import React, { useEffect, useState } from 'react'

export default function Test() {
const [images,setImages]=useState([])
    useEffect(() => {
          fetch('http://127.0.0.1:8000/api/images')
            .then(res => res.json())
            .then(response => {
              setImages(response.images)
            }
            )
       
      }, [])

  return (
    <div>
      
            {
                images.map((ele)=>{
                    return(
                        <img src={`http://127.0.0.1:8000/${ele.image}`} width='100'/>
                    )
                })
            }

    </div>
  )
}
