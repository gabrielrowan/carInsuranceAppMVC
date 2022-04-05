# How to run the car insurance web app locally 


1. Download the SQL file ```carinsurance_db``` and import it into your SQL database software.
You will see three tables inside the database - `car_type`, `cover_type` & `quotes`

2. Create a new directory with your project name, e.g:

```bash
mkdir carInsuranceWebApp
```

3. Once inside the new directory, clone this repo:

```bash
git@github.com:gabrielrowan/carInsuranceAppMVC.git
```

4. Once cloned, install the slim components by running:

```bash
composer install
```

5. To run the application, use this command:
```bash
composer start


Now you can see how the database updates when new quote data is added, and when the customer chooses to accept their quote! 


