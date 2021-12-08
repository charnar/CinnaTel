# Cinnamon Hotel Database System Project

#TeamCinnamonBun

Welcome to our hotel database system project. This is for the CSS325 Database Systems project this semester.
This is our first Github repository as well

The objective of this project is to:
- Apply our knowledge we learned from class to a real-world scenario
- Understand the functions and needs of hotel systems


Our hotel database system consists of both the guest and staff side. For the staff side, we will only focus on
the Manager and Receptionist positions of the hotel.

Function | HTML+CSS | PHP | MySQL |
:------------ | :-------------| :-------------| :-------------
Book a Room | :heavy_check_mark: | :heavy_check_mark: | :heavy_check_mark:
Check Room Availability | :heavy_check_mark: | :heavy_check_mark: | :heavy_check_mark:
Find a Hotel | :heavy_check_mark: |  :heavy_check_mark:
Hotel Branch Page | :heavy_check_mark: | :heavy_check_mark: | :heavy_check_mark:
View Guest Booking Information | :heavy_check_mark: | :heavy_check_mark: | :heavy_check_mark:
Check-in | :heavy_check_mark: | :heavy_check_mark: | :heavy_check_mark:
Check-out | :heavy_check_mark: | :heavy_check_mark: | :heavy_check_mark:
Edit Hotel Information | :heavy_check_mark: | :heavy_check_mark: | :heavy_check_mark:
Guest List | :heavy_check_mark: | :heavy_check_mark: | :heavy_check_mark:
View Guest Info | :heavy_check_mark: | :heavy_check_mark: | :heavy_check_mark:
View Payment Info | :heavy_check_mark: | :heavy_check_mark: | :heavy_check_mark:
Staff List | :heavy_check_mark: | :heavy_check_mark: | :heavy_check_mark:
Edit Staff Info | :heavy_check_mark: | :heavy_check_mark: | :heavy_check_mark:
Move Staff Hotel Branch | :heavy_check_mark: | :heavy_check_mark: | :heavy_check_mark:
View Room Types | :heavy_check_mark: | :heavy_check_mark: | :heavy_check_mark:
Edit Room Type | :heavy_check_mark: | :heavy_check_mark: | :heavy_check_mark:


# Stored Procedures and Triggers
- displayRooms(IN HotelID): Returns all room types from the given HotelID
- getGuestBooking(IN BookingID): Returns a guest booking from the given BookingID
- getHotelBranch(): Returns all hotel branches

- checkBankSlip: Makes BankSlip NULL if not inputted by the customer before inserting into the Payment entity
- checkBooking: Makes DiscountCode and ExtraInfo NULL if not inputted by the customer before inserting into the Booking entity
- encryptPassword: Encrypts the users password before inserting into the Staff entity

# Post-Semester Changes
Coming Soon
