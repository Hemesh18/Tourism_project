<head>
    <link rel="stylesheet" href="css/contact.css">
</head>
<body>
<div class="container">
    <div class="row">
            <h1>Book Your Tickets</h1>
    </div>
    <div class="row">
            <h4 style="text-align:center">Ready for your next adventure? Secure your spot today!</h4>
    </div>
    
    <form action="api_book_ticket.php" method="POST" class="row input-container">
            
            <div class="col-xs-12">
                <div class="styled-input wide">
                    <input type="text" name="fullName" required />
                    <label>Full Name</label> 
                </div>
            </div>
            
            <div class="col-md-6 col-sm-12">
                <div class="styled-input">
                    <input type="email" name="emailAddress" required />
                    <label>Email</label> 
                </div>
            </div>
            
            <div class="col-md-6 col-sm-12">
                <div class="styled-input" style="float:right;">
                    <input type="tel" name="phoneNumber" required />
                    <label>Phone Number</label> 
                </div>
            </div>

            <div class="col-xs-12">
                <div class="styled-input wide">
                    <input type="text" name="destination" required />
                    <label>Destination or Tour Name</label> 
                </div>
            </div>

            <div class="col-md-6 col-sm-12">
                <div class="styled-input">
                    <input type="date" name="departureDate" required />
                    <label style="top:-20px; font-size:12px;">Departure Date</label> 
                </div>
            </div>

            <div class="col-md-6 col-sm-12">
                <div class="styled-input" style="float:right;">
                    <input type="number" name="travelers" min="1" max="20" required />
                    <label>Number of Travelers</label> 
                </div>
            </div>

            <div class="col-xs-12">
                <div class="styled-input wide">
                    <textarea name="specialRequests"></textarea>
                    <label>Special Requests / Dietary Needs (Optional)</label>
                </div>
            </div>
            
            <div class="col-xs-12">
                <button type="submit" class="btn-lrg submit-btn" style="border: none; width: 100%; cursor: pointer;">
                    Confirm Booking
                </button>
            </div>
    </form>
</div>
</body>