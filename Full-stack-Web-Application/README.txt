// Seller
Username: Ngoc2003
Password: Web_programming!

Username: Duyen0112
Password: web_Programming!

Username: Hien0407
Password: Web_Programming!


// Buyer
Username: Khanh0706
Password: Buyer01!

Username: Lisa2703
Password: Buyer02!

Username: Mina2403
Password: Buyer03!


// Shipper
Username: Handsome
Password: Shipper01!

Username: Beautiful
Password: Shipper02!

Username: Energetic
Password: Shipper03!

// URL to our demonstration video
https://youtu.be/olbVSjl26Jc

//Script Web

Greetings Professors, we are Group 19 of class COSC2430 and this is the instruction video for our website. 
I am currently at the very first page of our website, the index.php. Here, users can click login if they want to use their existing accounts, or they can choose the role for the new accounts they are about to create. After clicking on one of the three options: vendor, customer, or shipper, they will be directed to the registration page corresponding to the role they have chosen. They need to fill out the required fields displayed on that page to finish registering. Each field may or may not have input constraint relating to length and character, and if the users violate at least one constraint, there will be message(s) to notify them. 
For the username field, apart from having to meet the length and character constraints, users must enter a name that never appears in the whole system’s username record. Meanwhile, each vendor account must use a unique business address and business name. These unique constraints use php, so the error will be displayed on the screen only after the users submit the form.
Only after fulfilling all the criteria, would the users receive a message and a record of their registration information. Now, they can click Login to access that newly created account. 
*Login/Logout and My Account*
In the login page, you can log in to the website by the account that you register before. After logging in you will be redirected to the my account page. In this page it will show all the information you provided when you signed up. You can also change the profile picture by clicking the change profile picture button. Then choose the picture you want to change and click submit. And now your profile picture has been changed. You can click the button logout to logout then it will back to login page.
*Vendor Page*
After login, the seller will directly move to the vendor page, which includes two pages to add products and view products. On the add product page will include name, price, description, and image upload
Each input will have a separate requirement such as:
- All input text should not be empty
- Product name must contain at least 10 characters, at most 20
- The description must contain at most 500 characters
If some inputs are not correct, the seller will not be able to add the product. After adding the product, the products will be updated on the page. The seller can see the clear details of each product while clicking to the product’s picture.
* Customer Page *
When we logged in as a User, we will have the option to choose between viewing our personal information or travel to the main page which is the all product page or cart page after we have ordered.
In the personal information page we will be able to see our Username, E-mail, Profile picture and our address
In the Customer page ( all product) we can view all the products that are available by the vendors. There also a filter bar which to help filter unnesscessary items to the customer desires. After filtering each product can be clicked on which will navigate us to a page displaying the clicked items.
In this details page, information such as product's name, price, quantities we want to added to our cart and the product's description. There is also a add to cart button to store all the chosen value in localstorage.
In the cart page is where we get the value for localstorage and append it into the table to show the items that we have added to cart. This page also have a remove button to remove item that we no longer want. The Cart page also have a update total function which automatically update our total price whenever we changed our cart and lastly is the Proceed to Checkout button. This button is used to finalize our shopping session, when clicked the cart will be clear and all of the information will be sent to the next phase of the process.
*Shipper page*
After login into the website as a shipper, you can click on the orders button to open the shipper page. This page will show all orders of the distribution hub that the shipper registers. You can change the status of the order you want from active to delivered or canceled then click submit. If the status of the order is not active, it will disappear. If you want to see more detail about the order, you can click on the id. On this page, you can see more information like the name or address of the customer.
