if ($(".counter").length) {
    $('.counter').counterUp({
        delay: 10,
        time: 2000
    });
}


let answers = document.querySelectorAll(".accordion");
answers.forEach((event) => {
    event.addEventListener("click", () => {
        if (event.classList.contains("active")) {
            event.classList.remove("active");
        } else {
            event.classList.add("active");
        }
    });
});

document.addEventListener("DOMContentLoaded", function() {
    const loadMoreBtn = document.getElementById("loadMoreBtn");
    const hiddenCampaigns = document.querySelector(".hidden-campaigns");
  
    loadMoreBtn.addEventListener("click", function(event) {
        event.preventDefault();
      hiddenCampaigns.classList.toggle("show");
      
      // Change button text based on visibility
      if (hiddenCampaigns.classList.contains("show")) {
        loadMoreBtn.textContent = "Show Less Campaigns";
      } else {
        loadMoreBtn.textContent = "Load All Campaigns";
      }
    });
  });



  
  document.addEventListener("DOMContentLoaded", function() {
    const readMoreBtns = document.querySelectorAll(".read-more-btn");
  
    readMoreBtns.forEach(btn => {
      btn.addEventListener("click", function(event) {
        event.preventDefault(); // Prevent default link behavior
  
        const hiddenContent = this.nextElementSibling;
        hiddenContent.classList.toggle("show");
      });
    });
  });
  


