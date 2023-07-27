import React, { useState } from "react";

const PaginatedItems = ({ itemsPerPage, data }) => {
  const [currentPage, setCurrentPage] = useState(1);

  const handleClickNext = () => {
    setCurrentPage(currentPage + 1);
  };

  const handleClickPrevious = () => {
    setCurrentPage(currentPage - 1);
  };

  // Calculate the index of the first and last items to display
  const lastIndex = currentPage * itemsPerPage;
  const firstIndex = lastIndex - itemsPerPage;

  // Slice the data array based on the calculated indices
  const paginatedData = data.filter((ele)=>{return ele.promotion>0}).slice(firstIndex, lastIndex);

  return (


    <div>

      {
      
      paginatedData.map((item, index) => (
        <div key={index}>{item.title}</div>
      ))
      }



      <div>
        <button
          onClick={handleClickPrevious}
          disabled={currentPage === 1}
        >
          Previous
        </button>
        <button
          onClick={handleClickNext}
          disabled={lastIndex >= data.length}
        >
          Next
        </button>
      </div>
    </div>
  );
};

export default PaginatedItems;
