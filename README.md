# ![SMS Orange](example/otg.png)

[![Build Status](https://travis-ci.org/smsorange/api-library.svg?branch=master)](https://travis-ci.org/smsorange/api-library)

SMS Orange API package is a framework agnostic PHP library for facilitating communication between a client application and SMS Orange API endpoints.

## Note
Work in progress, not for public use..

## Installation

In order to install the api package in your application, you will need composer and PHP >= 5.4

If you don't have composer installed, follow these instructions first:

https://getcomposer.org/doc/00-intro.md#globally

After confirming your composer installation, continue with the instructions below.

Put the following line in your composer require array
```json
"smsorange/api-library": "dev-master"
```

or, if you do not have the composer initiated in your project,
create the composer.json file in the project root and paste these lines:

```json
{
  "require": {
    "smsorange/api-library": "dev-master"
  }
}
```

then, from the project root, run this command in terminal

```
composer install
```

## API Token

In order to use this library, you must have your API Token ready.
Contact SmsOrange if you don't have one.

## API Parameters

Type        | Step          | Method        | Parameters             | Data type / format                    |
----------- | ------------- | ------------- | ---------------------- | ---------------------------- |
Cruise      | Search        | search        | cruise_data[from_date] <br/> cruise_data[to_date] <br/> cruise_data[cruises_cruise_line_id] <br/> cruise_data[destination_id] <br/> cruise_data[ship_code]<br/> cruise_data[departure_port_id] | yyyy-mm <br/> yyyy-mm <br/> `int` <br/> `int`<br/> `int` <br/> `int`  |
            | Select        | select        | cruise-code <br/> webservice   |  `string` <br/> `string`      |
            | GetComponents | getComponents | fare_code* <br/> cruise-code <br/> guests | `string` <br/> `string` <br/> `array` |
            | GetAvailableCategories | getAvailableCategories | cruise-code <br/> cruise-guests | `string` <br/> `array` |
            | GetCabins | getCabins | cruise-code <br/> category-code | `string` <br/> `string` |
            | HoldCabin | holdCabin | cruise-code <br/> cabin_number <br/> dining_preference <br/> first_name <br/> last_name | `string` <br/> `int` <br/> `string` <br/> `string` <br/> `string` |
            | Book | book | cruise-code <br/> guest_data** | `string` <br/> `array` |


** Guest data array for each guest, needs to contain the following keys

Key       | Type          |
----------- | ------------- |
first_name | `string` |
last_name | `string` |
localized_name* | `string` |
nationality | `string` (use options from the example app) |
gender | `string` (Male, Female, NotAvailable) |
birth_date | `string` (dd/mm/yyyy) |
place_of_birth* | `string` |
language_code | `string` (use options from the example app) |
home_phone | `string` |
mobile_phone* | `string` |
email* | `string` |
residence_address | `string` |
residence_city | `string` |
residence_state | `string` |
residence_country | `string` (use options from the example app) |
document_type | `string` (currently, only Maltese id_card is supported) |
document_number | `string` |
document_issue_date | `string` (dd/mm/yyyy) |
document_expiration_date | `string` (dd/mm/yyyy) |
document_issued_in_city | `string` |
document_issued_in_country | `string` (use options from the example app) |
emergency_info_first_name* | `string` |
emergency_info_last_name* | `string` |
emergency_info_telephone_number* | `string` |

* Optional

## Technical documentation
You can find the technical docs in the 'docs' folder.
Just run the index.html in your browser.


## License

MIT © 