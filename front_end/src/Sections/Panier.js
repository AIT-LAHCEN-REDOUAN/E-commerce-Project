import React, { useEffect, useState } from 'react'
import { useSelector } from 'react-redux';
import { Link } from 'react-router-dom';
import swal from 'sweetalert';
export default function Panier() {
  const [panier, setPanier] = useState([]);
  var total= 0
  const [status, setStatus] = useState(false)
  
  useEffect(() => {
    if (localStorage.getItem('auth_user') !== null) {
      const user = JSON.parse(localStorage.getItem('auth_user')).email;
      fetch(`http://127.0.0.1:8000/api/panier/${user}`)
        .then(res => res.json())
        .then(response => {
          setPanier(response.panier);
          setStatus(true)
        }
        )
    } else {
      setStatus(false)
    }
  }, [])



  const remove_produit = (id) => {
    setPanier(panier.filter((ele)=>{return ele.id!==id}));

    fetch(`http://127.0.0.1:8000/api/panier/${id}`,{
      method:'delete',
    headers:{
      'accept':'application/json',
      'Content-Type':'application/json'
    }
    })
        .then(res => res.json())
        .then(response => {
          swal('Success',response.message,'success');
        //  window.location.reload();
        }
        )
  }

  const handeldecrement=(cart_id)=>{
      setPanier(panier.map((item)=>item.id==cart_id ? {...item,quantity:item.quantity-(item.quantity>1 ? 1:0)} : item)
      );
      updatequantity(cart_id,'dec');
     
      }
  

  const handleincrement=(cart_id)=>{
    setPanier(panier.map((item)=>item.id==cart_id ? {...item,quantity:item.quantity+1} : item))
    updatequantity(cart_id,'inc');

  }

  const updatequantity=(cart_id,methode)=>{
    const user = JSON.parse(localStorage.getItem('auth_user')).email;
    fetch(`http://127.0.0.1:8000/api/panier/${cart_id}/${methode}/${user}`,{
      method:'put',
      headers:{
        'accept':"application/json",
        'Content-type':'application/json'
      }
    }).then(res=> res.json())
    .then(response=>{console.log(response)})
  }

  return (
    <section className="h-100" style={{ backgroundColor: '#eee' }}>
      <div className="container h-100 py-5">

        {
          status && panier.length>0 ?
            <div className="row ">
              <div className="col-md-8">

                <div className=" justify-content-between align-items-center mb-4">
                  <h3 className="fw-normal mb-0 text-black">Shopping Cart</h3>
                </div>
                {
                  panier &&
                  panier.map(ele => {
                    total+=parseFloat(ele.produit_id.prix)*parseFloat(ele.quantity).toFixed(2)
                    return (
                      <div className="card rounded-3 mb-4">
                        <div className="card-body p-4">
                          <div className="row d-flex justify-content-between align-items-center">
                            <div className="col-md-2 col-lg-2 col-xl-2">
                              {ele.produit_id.image_id.length > 0 &&

                                <img
                                   src={`http://127.0.0.1:8000/${ele.produit_id.image_id[0].image}`}
                                  className="img-fluid rounded-3" alt="Cotton T-shirt" />
                              }
                            </div>
                            <div className="col-md-3 col-lg-3 col-xl-3">
                              <p className="lead fw-normal mb-2">{ele.produit_id.title}</p>
                              <p><span className="text-muted">{ele.produit_id.marque_id.marque} </span></p>
                            </div>
                            <div className="col-md-3 col-lg-3 col-xl-2 d-flex">
                              <button className="btn btn-link px-2" onClick={() => { handeldecrement(ele.id) }}>
                                <i className="fas fa-minus"></i>
                              </button>

                              <input id="form1" min="0" name="quantity" value={ele.quantity} type="number"
                                className="form-control form-control-sm" />
                              <button className="btn btn-link px-2" onClick={() => { handleincrement(ele.id)}}>
                                <i className="fas fa-plus"></i>
                              </button>
                            </div>
                            <div className="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                              <h5 className="mb-0">{ele.produit_id.prix*ele.quantity} DHs</h5>
                            </div>
                            <div className="col-md-1 col-lg-1 col-xl-1 text-end">
                              <button className="text-danger btn" onClick={() => { remove_produit(ele.id) }}><i className="fas fa-trash fa-lg"></i></button>
                            </div>
                          </div>
                        </div>
                      </div>
                    )
                  })}
              </div>

              <div class="col-md-4">
                <div class="card mb-4">
                  <div class="card-header py-3">
                    <h5 class="mb-0 fw-bold">Summary</h5>
                  </div>
                  <div class="card-body">
                    <ul class="list-group list-group-flush">
                      <li
                        class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                        Products
                        <span>${total}</span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                        Shipping
                        <span>Free</span>
                      </li>
                      <li
                        class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                        <div>
                          <strong>Total amount</strong>
                          <strong>
                            <p class="mb-0">(including VAT)</p>
                          </strong>
                        </div>
                        <span><strong>${total}</strong></span>
                      </li>
                    </ul>

                    <Link to='/Checkout' type="button" class="btn btn-primary btn-lg btn-block fw-bold">
                      Go to checkout
                    </Link>
                  </div>
                </div>
              </div>
            </div>
            :
            <div className="row ">
              <div className=" justify-content-between align-items-center mb-4">
                <h3 className="fw-normal mb-0 text-black">Shopping Cart</h3>
              </div>
              <div className="card rounded-3 mb-4">
                <div className="card-body p-4">
                  <div className="row d-flex justify-content-between align-items-center">

                    <div className="col-md-12 col-lg-12 col-xl-12 text-center">
                      <h3><span className="text-muted ">cart vide</span></h3>
                    </div>


                  </div>
                </div>
              </div>
            </div>
        }

      </div>

    </section>
  )
}
