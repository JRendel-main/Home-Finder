<!DOCTYPE html>
<html>
  <head>
    <title>My Location</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">

  <style>
    /* Reset default margins and paddings */
body, h1, h2, h3, p, ul, li {
  margin: 0;
  padding: 0;
}

/* Set a background color and text color */
body {
  background-color: #f5f5f5;
  color: #333;
  font-family: Arial, sans-serif;
}

/* Style the header */
header {
  background-color: #333;
  color: white;
  text-align: center;
  padding: 1rem 0;
}

.header-left {
  display: flex;
  align-items: center;
}

.logo {
  width: 50px;
  height: auto;
  margin-right: 1rem;
}

nav ul {
  list-style: none;
}

nav li {
  display: inline;
  margin-right: 1rem;
}

nav a {
  text-decoration: none;
  color: white;
}

/* Style the main content */
.main {
  padding: 2rem;
}

.card {
  background: #e0e0e0;
  border-radius: 50px;
  padding: 2rem;
  margin-bottom: 2rem;
}

.booking-form {
  max-width: 300px;
  margin: 0 auto;
}

.form-group {
  margin-bottom: 1rem;
}

label {
  display: block;
  margin-bottom: 0.5rem;
}

input[type="date"],
select {
  width: 100%;
  padding: 0.5rem;
  border: 1px solid #ccc;
  border-radius: 4px;
}

button {
  padding: 0.5rem 1rem;
  background-color: #333;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

/* Style the sections */
section {
  padding: 2rem;
  background-color: white;
  border-radius: 10px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  margin-bottom: 2rem;
  display: none; /* Hide all sections by default */
}

section h2 {
  margin-bottom: 1rem;
  font-size: 1.5rem;
}

ul {
  list-style-type: disc;
  margin-left: 2rem;
}

/* Style the footer */
footer {
  background-color: #333;
  color: white;
  text-align: center;
  padding: 1rem 0;
}

.footer-left {
  display: flex;
  justify-content: center;
}

.footer-right {
  margin-top: 0.5rem;
}

/* Update the tabs container to make it horizontal */
.tabs {
  display: flex;
  background-color: white; /* Change background color to white */
  padding: 1rem 0;
  width: 100%; /* Adjust width as needed */
}

/* Update the style for individual tabs */
.tab {
  display: flex;
  align-items: center;
  padding: 0.5rem 1rem;
  color: #333; /* Change text color to a darker color for better contrast */
  cursor: pointer;
  transition: background-color 0.3s, color 0.3s;
}

/* Add spacing between tabs */
.tab + .tab {
  margin-left: 1rem;
}

/* Add hover effect for tabs */
.tab:hover {
  background-color: #f0f0f0; /* Change background color on hover */
}


    /* Additional styling */
    section {
      border: 1px solid #ddd;
      padding: 1rem;
    }

    section h2 {
      font-size: 1.8rem;
      margin-bottom: 1rem;
    }

    ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
    }

    ul li {
      display: flex;
      align-items: center;
      margin-bottom: 0.5rem;
    }

    ul li:before {
      content: '\2022';
      color: #333;
      font-weight: bold;
      margin-right: 0.5rem;
    }

    .review {
      border-bottom: 1px solid #ddd;
      padding-bottom: 1rem;
      margin-bottom: 1rem;
    }

    .review h3 {
      font-size: 1.2rem;
      margin-bottom: 0.5rem;
    }

    /* ... (your existing CSS code) ... */

    /* ... (your existing CSS code) ... */

.booking-form {
  max-width: 300px;
  margin: 0 auto;
}

.form-group {
  margin-bottom: 1rem;
}

label {
  display: block;
  margin-bottom: 0.5rem;
}

input[type="date"],
select {
  width: 100%;
  padding: 0.5rem;
  border: 1px solid #ccc;
  border-radius: 4px;
}

button {
  padding: 0.5rem 1rem;
  background-color: #333;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  transition: background-color 0.3s;
}

button:hover {
  background-color: #555;
}

#total-bill {
  font-size: 1.2rem;
  font-weight: bold;
  text-align: center;
  margin-top: 1rem;
}

 <style>
    /* Reset default margins and paddings */
    body, h1, h2, h3, p, ul, li {
      margin: 0;
      padding: 0;
    }

    /* Set a background color and text color */
    body {
      background-color: #f5f5f5;
      color: #333;
      font-family: Arial, sans-serif;
    }

    /* Style the profile section */
    #profile {
      padding: 2rem;
      background-color: white;
      border-radius: 10px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      margin-bottom: 2rem;
    }

    #profile h2 {
      font-size: 1.8rem;
      margin-bottom: 1rem;
    }

    .profile-container {
      display: flex;
      align-items: center;
    }

    .profile-picture {
      width: 120px;
      height: 120px;
      border-radius: 50%;
      overflow: hidden;
      margin-right: 1.5rem;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .profile-picture img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .profile-info {
      flex: 1;
    }

    .profile-info h3 {
      font-size: 1.5rem;
      margin-bottom: 0.5rem;
    }

    .profile-info p {
      margin-bottom: 1rem;
    }

    .profile-info ul {
      list-style-type: none;
      margin-bottom: 1rem;
    }

    .profile-info li {
      margin-bottom: 0.3rem;
    }

    .profile-info button {
      padding: 0.5rem 1rem;
      background-color: #ff5a5f;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .profile-info button:hover {
      background-color: #ff4449;
    }

    /* Popup styles */
    .popup {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.7);
      align-items: center;
      justify-content: center;
      z-index: 1000;
    }

    .popup-content {
      background-color: white;
      padding: 2rem;
      border-radius: 10px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }

    .popup h3 {
      font-size: 1.5rem;
      margin-bottom: 1rem;
    }

    .popup textarea {
      width: 100%;
      padding: 0.5rem;
      border: 1px solid #ccc;
      border-radius: 4px;
      margin-bottom: 1rem;
    }

    .popup button {
      padding: 0.5rem 1rem;
      background-color: #ff5a5f;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .popup button:hover {
      background-color: #ff4449;
    }


  </style>
<style type="text/css">
  .socail-media {
  display: flex;
  align-items: center;
  align-content: center;
  justify-content: center;
  gap: 20px;
  list-style: none;
}

.socail-media li a {
  width: 50px;
  height: 50px;
  background-color: #5b9d15;
  display: flex;
  overflow: hidden;
  align-items: center;
  align-content: center;
  justify-content: center;
  position: relative;
  z-index: 9;
  border: 1px solid #5b9d15;
}

.socail-media li a svg {
  width: 24px;
  height: 24px;
  -o-object-fit: contain;
  object-fit: contain;
  filter: invert(100%) sepia(0%) saturate(7455%) hue-rotate(57deg) brightness(108%) contrast(105%);
}

.socail-media li a::after {
  content: "";
  position: absolute;
  width: 100%;
  height: 100%;
  -webkit-clip-path: polygon(0 0, 100% 0, 0 0, 0 100%);
  clip-path: polygon(0 0, 100% 0, 0 0, 0 100%);
  background-color: #fff;
  z-index: -1;
  top: 0;
  left: 0;
  opacity: 0;
}

.socail-media li a:hover::after {
  animation: sideClip 0.5s linear;
  -webkit-clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%);
  clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%);
  opacity: 1;
}

.socail-media li a:hover svg {
  animation: fadeInLeft 0.3s linear both;
  filter: invert(52%) sepia(85%) saturate(2286%) hue-rotate(54deg) brightness(92%) contrast(84%);
}

@keyframes sideClip {
  0% {
    clip-path: polygon(0 0, 100% 0, 0 0, 0 100%);
  }

  50% {
    clip-path: polygon(0 0, 100% 0, 0 100%, 0 100%);
  }

  100% {
    clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%);
  }
}

@keyframes fadeInLeft {
  from {
    opacity: 0;
    transform: translate3d(-100%, 0, 0);
  }

  to {
    opacity: 1;
    transform: none;
  }
}

</style>


  </head>
  <body>
    <header>
<!-- ... (your existing HTML code) ... -->

<div class="tabs">
  <div class="tab active" onclick="changeTab('photos')">Photos</div>
  <div class="tab" onclick="changeTab('amenities')">Amenities</div>
  <div class="tab" onclick="changeTab('reviews')">Reviews</div>
  <div class="tab" onclick="changeTab('location')">Location</div>
  <div class="tab" onclick="changeTab('profile')">Profile</div>
  <div class="tab" onclick="changeTab('things-to-know')">Things to know</div>
  <div class="tab" onclick="changeTab('contact')">Contact Host</div>
</div>

<!-- ... (your existing HTML code) ... -->

    </header>

    <script type="text/javascript">
      // Define functions to handle tab switching
function changeTab(tabId) {
  const tabs = ['photos', 'amenities', 'reviews', 'location', 'profile', 'things-to-know', 'contact'];
  tabs.forEach(tab => {
    const section = document.getElementById(tab);
    if (section) {
      if (tab === tabId) {
        section.style.display = 'block';
      } else {
        section.style.display = 'none';
      }
    }
  });
}

// Initialize with the default tab
window.onload = function() {
  changeTab('photos');
};

    </script>
    <main>
      <div class="content-wrapper">
<!-- ... (your existing HTML code) ... -->








<section id="photos">
  <h2>Photos</h2>
  <div class="photo-container">
    <img src="pink.jpg" alt="Photo 1">
    <img src="pink.jpg" alt="Photo 2">
    <img src="pink.jpg" alt="Photo 3">
    <!-- Add more image elements here -->
    <div id="additional-photos" style="display: none;">
      <img src="pink.jpg" alt="Photo 4">
      <img src="pink.jpg" alt="Photo 5">
      <img src="pink.jpg" alt="Photo 6">
      <!-- Add more image elements here -->
    </div>
  </div>
  <button id="see-more-btn" onclick="showAdditionalPhotos()">See more</button>
</section>

<script>
  function showAdditionalPhotos() {
    const additionalPhotos = document.getElementById("additional-photos");
    const seeMoreButton = document.getElementById("see-more-btn");

    if (additionalPhotos.style.display === "none") {
      additionalPhotos.style.display = "block";
      seeMoreButton.textContent = "See less";
    } else {
      additionalPhotos.style.display = "none";
      seeMoreButton.textContent = "See more";
    }
  }
</script>

<style>
  #photos {
  background-color: #4a148c; /* Futuristic violet background color */
  padding: 3rem 0;
  text-align: center;
  position: relative;
}

#photos h2 {
  font-size: 2.5rem;
  margin-bottom: 1.5rem;
  color: white; /* Set text color to white */
}

.photo-container {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 1rem; /* Reduced gap for images to be closer */
  margin-bottom: 10rem;
}

.photo-container img {
  max-width: 100px; /* Reduced image size */
  height: auto;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(255, 255, 255, 0.1);
  transition: transform 0.2s, box-shadow 0.2s; /* Slightly faster transition */
  cursor: pointer;
  transform: scale(1); /* Initial size */
}

.photo-container img:hover {
  transform: scale(1.05); /* Slightly bigger on hover */
  box-shadow: 0 0 20px rgba(255, 255, 255, 0.2);
}

.photo-container img.active {
  transform: scale(1.7); /* 70% larger size when clicked */
  z-index: 1;
  box-shadow: 0 0 30px rgba(255, 255, 255, 0.3);
}

#additional-photos {
  width: 100%;
  display: none;
  margin-top: 1rem;
}

#additional-photos img {
  max-width: 100px; /* Reduced image size */
  height: auto;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(255, 255, 255, 0.1);
  transition: transform 0.2s, box-shadow 0.2s; /* Slightly faster transition */
}

#see-more-btn {
  background-color: transparent;
  border: 2px solid white;
  color: white;
  padding: 0.5rem 1.5rem;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s, color 0.3s, border-color 0.3s;
}

#see-more-btn:hover {
  background-color: white;
  color: #4a148c; /* Change text color on hover */
  border-color: transparent;
}

</style>




      <section id="amenities">
<h2>Amenities</h2>
        <ul>
          <li>Free WiFi</li>
          <li>Air conditioning</li>
          <li>TV</li>
          <li>Private bathroom</li>
          <li>Free parking</li>
          <li>Swimming pool</li>
          <li>Gym</li>
          <li>Restaurant</li>
          <li>Bar</li>
          <li>24-hour front desk</li>
        </ul>
      </section>
        <section id="reviews">
    <h2>Reviews</h2>

    <a href="rating.php" id="write-review-btn">Write a review</a>
  </section>

  <section id="location">
    <h2>Location</h2>
    <div id="map"></div>
    <script>
      // Initialize and add the map
      function initMap() {
        // The location of the hotel
        const hotelLocation = { lat: 40.748817, lng: -73.985428 };
        // The map, centered at hotel location
        const map = new google.maps.Map(document.getElementById("map"), {
          zoom: 15,
          center: hotelLocation,
        });
        // The marker, positioned at hotel location
        const marker = new google.maps.Marker({
          position: hotelLocation,
          map: map,
        });
      }
    </script>
    <!--Load the API from the specified URL
    * The async attribute allows the browser to render the page while the API loads
    * The callback parameter executes the initMap() function when the API finishes loading-->
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg&callback=initMap">
    </script>
  <div class="map-container">
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d961.4367548221942!2d120.94308796952042!3d15.444199499071784!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397262b1b0c0001%3A0xdf107a996b423b0d!2sLeo%20Building!5e0!3m2!1sen!2sca!4v1688214723199!5m2!1sen!2sca" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
  </section>


<section id="profile">
    <h2>Profile</h2>
    <div class="profile-container">
      <a href="owner-profile-page.html">
        <div class="profile-picture">
          <img src="vox.jpg" alt="Owner Profile Picture">
        </div>
      </a>
      <div class="profile-info">
        <h3>John Smith</h3>
        <p>Superhost</p>
        <p>I've been hosting on Airbnb for over 5 years and love welcoming guests from all over the world. My home is a cozy and comfortable space that I'm sure you'll enjoy during your stay. Please feel free to contact me if you have any questions!</p>
        <ul>
          <li><strong>Response rate:</strong> 100%</li>
          <li><strong>Response time:</strong> within an hour</li>
          <li><strong>Languages:</strong> English, Spanish</li>
        </ul>
        <button id="contact-host-btn">Contact host</button>
      </div>
    </div>
  </section>

  <!-- Popup for Contact Host -->
  <div id="popup" class="popup">
    <div class="popup-content">
      <h3>Contact John Smith</h3>
      <p>Start a chat with the host:</p>
      <textarea id="chat-message" placeholder="Type your message here..."></textarea>
      <button id="send-message-btn">Send Message</button>
      <button id="close-popup-btn">Close</button>
    </div>
  </div>


  <script>
    const contactHostBtn = document.getElementById("contact-host-btn");
    const popup = document.getElementById("popup");
    const closePopupBtn = document.getElementById("close-popup-btn");

    contactHostBtn.addEventListener("click", () => {
      popup.style.display = "flex";
    });

    closePopupBtn.addEventListener("click", () => {
      popup.style.display = "none";
    });

    // You can add code to handle sending messages here
  </script>

      <section id="reviews">
        <h2>Reviews</h2>
        <div class="review">
          <h3>John Doe</h3>
          <p>"John was a great host and his place was exactly as described. I would definitely stay here again!"</p>
        </div>
        <div class="review">
          <h3>Jane Smith</h3>
          <p>"John's home was in a great location and he was very helpful with recommendations for things to do in the area."</p>
        </div>
        <div class="review">
          <h3>Bob Johnson</h3>
          <p>"John was very responsive and accommodating. His home was clean and comfortable."</p>
        </div>
        <a href="#">Read all reviews</a>
      </section>

  <section id="things-to-know">
    <h2>Things to know</h2>
    <ul>
      <li>Check-in time: 3:00 PM</li>
      <li>Check-out time: 11:00 AM</li>
      <li>Pets not allowed</li>
      <li>No smoking</li>
      <li>Payment methods: Credit card, Cash, Gcash</li>
      <li>Additional fees may apply</li>
      <li>PHP1300/month</li>
      <li>PHP100/day</li>
    </ul>
  </section>

    <section id="contact">
    <h2>Contact Host</h2>
<ul class="socail-media">
  <li>
    <a href="#">
       <svg viewBox="0 0 10.712 20" height="20" width="10.712" xmlns="http://www.w3.org/2000/svg">
  <path transform="translate(-22.89)" d="M32.9,11.25l.555-3.62H29.982V5.282a1.81,1.81,0,0,1,2.041-1.955H33.6V.245A19.255,19.255,0,0,0,30.8,0c-2.86,0-4.73,1.734-4.73,4.872V7.63H22.89v3.62h3.179V20h3.913V11.25Z" id="facebook"></path>
</svg>

    </a>
  </li>

  <li>
    <a href="#">
            <svg viewBox="0 0 20 20" height="20" width="20" xmlns="http://www.w3.org/2000/svg" id="instagram">
          <g transform="translate(15.354 3.707)" data-name="Group 64" id="Group_64">
            <g data-name="Group 63" id="Group_63">
              <path fill="#00" transform="translate(-392.401 -94.739)" d="M392.871,94.739a.47.47,0,1,0,.47.47A.47.47,0,0,0,392.871,94.739Z" data-name="Path 5" id="Path_5"></path>
            </g>
          </g>
          <g transform="translate(5.837 5.837)" data-name="Group 66" id="Group_66">
            <g data-name="Group 65" id="Group_65">
              <path fill="#000" transform="translate(-145.804 -145.804)" d="M149.967,145.8a4.163,4.163,0,1,0,4.163,4.163A4.168,4.168,0,0,0,149.967,145.8Z" data-name="Path 6" id="Path_6"></path>
            </g>
          </g>
          <g data-name="Group 68" id="Group_68">
            <g data-name="Group 67" id="Group_67">
              <path fill="#000" d="M14.517,0H5.483A5.489,5.489,0,0,0,0,5.483v9.035A5.489,5.489,0,0,0,5.483,20h9.035A5.489,5.489,0,0,0,20,14.517V5.483A5.489,5.489,0,0,0,14.517,0ZM10,15.486A5.486,5.486,0,1,1,15.486,10,5.492,5.492,0,0,1,10,15.486Zm5.814-9.633A1.667,1.667,0,1,1,17.48,4.186,1.669,1.669,0,0,1,15.814,5.853Z" data-name="Path 7" id="Path_7"></path>
            </g>
          </g>
        </svg>

    </a>
  </li>

  <li>
    <a href="#">
      <svg viewBox="0 0 20 20" height="20" width="20" xmlns="http://www.w3.org/2000/svg" id="_x31_0.Linkedin">
  <path fill="#000" transform="translate(-31.438 -29.201)" d="M51.438,49.2V41.755c0-3.659-.788-6.455-5.057-6.455a4.413,4.413,0,0,0-3.99,2.186h-.051V35.63H38.3V49.2h4.219V42.466c0-1.779.33-3.482,2.516-3.482,2.16,0,2.186,2.008,2.186,3.583v6.607h4.219Z" data-name="Path 1" id="Path_1"></path>
  <path fill="#000" transform="translate(-10.97 -30.17)" d="M11.3,36.6h4.219V50.17H11.3Z" data-name="Path 2" id="Path_2"></path>
  <path fill="#000" transform="translate(-10 -10)" d="M12.44,10a2.452,2.452,0,1,0,2.44,2.44A2.44,2.44,0,0,0,12.44,10Z" data-name="Path 3" id="Path_3"></path>
</svg>

    </a>
  </li>

  <li>
    <a href="#">
      <svg viewBox="0 0 19.838 18.6" height="18.6" width="19.838" xmlns="http://www.w3.org/2000/svg">
  <g transform="translate(0 -15.988)" data-name="svgexport-10 (13)" id="svgexport-10_13_">
    <g transform="translate(0 15.988)" data-name="Group 10" id="Group_10">
      <g transform="translate(0 0)" data-name="Group 9" id="Group_9">
        <path fill="#000" transform="translate(0 -15.988)" d="M19.449,29.877a5.73,5.73,0,0,1-3.9-3.269.188.188,0,0,0-.011-.022.82.82,0,0,1-.093-.675c.145-.34.7-.516,1.068-.632.107-.033.207-.066.29-.1a2.245,2.245,0,0,0,.791-.472.751.751,0,0,0,.241-.541.851.851,0,0,0-.637-.738,1.152,1.152,0,0,0-.432-.082.961.961,0,0,0-.4.082,2.255,2.255,0,0,1-.827.236.759.759,0,0,1-.274-.06c.007-.124.015-.252.024-.383l0-.057a9.821,9.821,0,0,0-.253-4.005,5.388,5.388,0,0,0-1.214-1.737,5.076,5.076,0,0,0-1.452-.957,5.737,5.737,0,0,0-2.265-.479h-.05l-.341,0a5.759,5.759,0,0,0-2.268.479A5.048,5.048,0,0,0,6,17.426,5.4,5.4,0,0,0,4.8,19.16a9.829,9.829,0,0,0-.254,4v0c.009.144.019.294.027.44a.8.8,0,0,1-.325.061,2.151,2.151,0,0,1-.884-.237.794.794,0,0,0-.336-.069,1.188,1.188,0,0,0-.594.166.822.822,0,0,0-.42.537.741.741,0,0,0,.283.7,2.438,2.438,0,0,0,.739.423c.084.033.185.064.29.1.367.117.924.293,1.069.632a.826.826,0,0,1-.094.675.176.176,0,0,0-.01.022,6.566,6.566,0,0,1-1,1.545,5.608,5.608,0,0,1-1.205,1.064,4.435,4.435,0,0,1-1.693.658A.463.463,0,0,0,0,30.359a.587.587,0,0,0,.048.2h0a1.239,1.239,0,0,0,.672.574,7.675,7.675,0,0,0,1.941.5,2.354,2.354,0,0,1,.119.427c.032.149.066.3.114.465a.508.508,0,0,0,.532.387,2.59,2.59,0,0,0,.456-.063,5.189,5.189,0,0,1,1.04-.118,4.521,4.521,0,0,1,.744.063,3.534,3.534,0,0,1,1.39.718A4.5,4.5,0,0,0,9.8,34.587q.05,0,.1,0c.04,0,.091,0,.143,0a4.507,4.507,0,0,0,2.74-1.066h0a3.546,3.546,0,0,1,1.39-.717,4.521,4.521,0,0,1,.744-.063,5.213,5.213,0,0,1,1.04.11,2.514,2.514,0,0,0,.456.056h.022a.5.5,0,0,0,.51-.381c.047-.16.081-.309.114-.461a2.435,2.435,0,0,1,.118-.424,7.728,7.728,0,0,0,1.941-.5,1.244,1.244,0,0,0,.671-.573.589.589,0,0,0,.05-.2A.461.461,0,0,0,19.449,29.877Z" data-name="Path 6565" id="Path_6565"></path>
      </g>
    </g>
  </g>
</svg>

    </a>
  </li>

  <li>
    <a href="#">
      <svg viewBox="0 0 19.738 22.466" height="22.466" width="19.738" xmlns="http://www.w3.org/2000/svg" data-name="Group 101" id="Group_101">
  <path fill="#000" transform="translate(-31.423 -0.39)" d="M51.151,6.015a5.661,5.661,0,0,1-3.42-1.143A5.662,5.662,0,0,1,45.469.39H41.8V10.414l0,5.49a3.325,3.325,0,1,1-2.281-3.151V9.029a7.218,7.218,0,0,0-1.058-.078,7.034,7.034,0,0,0-5.286,2.364,6.893,6.893,0,0,0,.311,9.505,7.158,7.158,0,0,0,.663.579,7.035,7.035,0,0,0,4.312,1.458,7.219,7.219,0,0,0,1.058-.078,7.011,7.011,0,0,0,3.917-1.959,6.868,6.868,0,0,0,2.06-4.887l-.019-8.2a9.3,9.3,0,0,0,5.688,1.933V6.014h-.011Z" data-name="Path 6566" id="Path_6566"></path>
</svg>

    </a>
  </li>
  
   <li>
    <a href="#">
       <svg viewBox="0 0 23.06 18" height="18" width="23.06" xmlns="http://www.w3.org/2000/svg">
        <path fill="#000" transform="translate(0 -48.082)" d="M20.69,52.568c.015.2.015.394.015.591A13.085,13.085,0,0,1,7.258,66.082,13.752,13.752,0,0,1,0,64.043a10.168,10.168,0,0,0,1.141.056,9.712,9.712,0,0,0,5.868-1.941,4.715,4.715,0,0,1-4.419-3.15,6.2,6.2,0,0,0,.893.07,5.189,5.189,0,0,0,1.244-.155,4.592,4.592,0,0,1-3.79-4.458V54.41a4.907,4.907,0,0,0,2.136.577A4.5,4.5,0,0,1,.966,51.2a4.375,4.375,0,0,1,.644-2.292,13.621,13.621,0,0,0,9.745,4.753,4.936,4.936,0,0,1-.117-1.041,4.635,4.635,0,0,1,4.726-4.542,4.806,4.806,0,0,1,3.453,1.434,9.538,9.538,0,0,0,3-1.1,4.567,4.567,0,0,1-2.078,2.5,9.779,9.779,0,0,0,2.722-.7A9.953,9.953,0,0,1,20.69,52.568Z" id="twitter"></path>
      </svg>


    </a>
  </li>
</ul>            
  </section>

  <div class="card" style="border-radius: 50px; background: #e0e0e0;">
  <div class="booking-form">
    <form action="" method="post">
      <div class="form-group">
        <label for="checkin-date">Check-in Date:</label>
        <input type="date" id="checkin-date" name="checkin-date" required>
      </div>
      <div class="form-group">
        <label for="checkout-date">Check-out Date:</label>
        <input type="date" id="checkout-date" name="checkout-date" required>
      </div>
      <div class="form-group">
        <label for="guests">Guests:</label>
        <select id="guests" name="guests" required>
          <option value="">Select Guests</option>
          <option value="1">1 Guest</option>
          <option value="2">2 Guests</option>
          <option value="3">3 Guests</option>
          <option value="4">4 Guests</option>
          <option value="5">5 Guests</option>
          <option value="6">6 Guests</option>
        </select>
      </div>
      <div class="form-group">
        <button type="button" id="calculate-bill">Calculate Bill</button>
        <p id="total-bill"></p>
   <script src="https://www.paypal.com/sdk/js?client-id=AZ_NBnhgz1huNt6SwX2BAlNMWo_jwpJfHmlHUPyz254iq-yc6XGPIAdi7DJsX4w4yvShrFznPCeST2VQ"></script>
</head>
<body>
 




    <div id="paypal-button-container"></div>


    <script>

        paypal.Buttons({

            createOrder: function(data, actions){

                
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '1500'
                        }
                    }]
                })

            },
            onApprove: function(data, actions){
                console.log('Data :' + data);
                console.log('Action : '+actions);
                return actions.order.capture().then(function(details){
                    console.log(details.payer.name.given_name);
                })
            }

        }).render('#paypal-button-container');

    </script>
      </div>
    </form>
  </div>
</div>

<script>
document.getElementById("calculate-bill").addEventListener("click", function () {
  const checkinDate = new Date(document.getElementById("checkin-date").value);
  const checkoutDate = new Date(document.getElementById("checkout-date").value);
  const guests = parseInt(document.getElementById("guests").value);

  if (isNaN(guests)) {
    alert("Please select the number of guests.");
    return;
  }

  const timeDiff = checkoutDate - checkinDate;
  const days = Math.ceil(timeDiff / (1000 * 60 * 60 * 24));
  const months = Math.ceil(days / 30); // Assuming a month has 30 days

  const pricePerNight = 100; // Change this to your price per night
  const totalBill = pricePerNight * days * guests;
  const totalBillPerMonth = pricePerNight * 30 * guests * months;

  document.getElementById("total-bill").innerHTML = `Total Bill: $${totalBill} for ${days} days (${months} months)<br>`;
  document.getElementById("total-bill").innerHTML += `Total Bill Per Month: $${totalBillPerMonth} for ${months} months`;
});
</script>

<!-- ... (your existing HTML code) ... -->
  
</main>

<footer>
  <div class="footer-left">
      <nav>
        <ul>
          <li><a href="#">About</a></li>
          <li><a href="#">Community</a></li>
          <li><a href="#">Help</a></li>
          <li><a href="#">Host</a></li>
          <li><a href="#">Terms</a></li>
          <li><a href="">Privacy</a></li>
        </ul>
      </nav>
  </div>
  <div class="footer-right">
    <p>&copy; 2023 Hotel Name. All rights reserved.</p>
  </div>
</footer>


