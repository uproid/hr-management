[![Laravel](https://github.com/uproid/hr-management/actions/workflows/laravel.yml/badge.svg?branch=main)](https://github.com/uproid/hr-management/actions/workflows/laravel.yml)
## the tools:

	Docker *
	Mysql
	PHP
	Laravel 

## endpoints:

    1.	GET    /api/employee                All employees
    2.	GET    /api/employee/1              An empeloyee number 1
    3.	GET    /api/departments             All Deppartments
    4.	GET    /api/departments/1           An deppartment number 1
    5.	GET    /api/jobs                    All Jobs
    6.	GET    /api/jobs/min_salary/100     All Jobs that they have minimal 100$ salary
    7.	GET    /api/jobs/max_salary/100     All Jobs that they have maximal 100$ salary
    8.	POST   /api/employee                Add an Employee
    9.	PUT    /api/employee/id             Update an Employee

## API TOKEN:
    API_TOKEN should be in the '.env' file. and you can send it to the server by Authorization (API Key)


## Output Json Model:

	{
		"data":{ OTHER's JSON MODEL },
		"message":["STRING MESSAGE OF THE LAST ESTATUS RESULT","ERROR 1"],
		"code": 200, // The integer result of status for example (403,501,200,201,202,000)
		"endpoint":"employee", //The used endpoint
		"timestamp": 12345678, //The timestamp for the validate server for calculate respons time.
	}

## PUT / POST body:
    {
      "first_name":"Alex",
      "last_name":"ZuidWijk",
      "email":"AlexZuildwijk@uproid.com",
      "phone_number":"0681234567",
      "hire_date":"15-05-2021",
      "salary":"5000.20",
      "department_id":"1",
      "job_id":"1",
      "dependents":[
        {
          "first_name":"Pitter",
          "last_name":"Zuidwijk",
          "relationship":"Son"
        },{
          "first_name":"Lara",
          "last_name":"Zuidwijk",
          "relationship":"Wife"
        },{
          "first_name":"Maria",
          "last_name":"Zuidwijk",
          "relationship":"Daughter"
        }
      ]
    }
	
## Json of output /api/employee

    {
        "data": [
            {
                "id": 100,
                "first_name": "Steven",
                "last_name": "King",
                "email": "steven.king@sqltutorial.org",
                "phone_number": "515.123.4567",
                "hire_date": "1987-06-17",
                "job_id": 4,
                "salary": "24000.00",
                "manager_id": null,
                "department_id": 9,
                "job": {
                    "id": 4,
                    "job_title": "President",
                    "min_salary": "20000.00",
                    "max_salary": "40000.00"
                },
                "department": {
                    "id": 9,
                    "department_name": "Executive",
                    "location_id": 1700,
                    "location": {
                        "id": 1700,
                        "street_address": "2004 Charade Rd",
                        "postal_code": "98199",
                        "city": "Seattle",
                        "state_province": "Washington",
                        "country_id": "US",
                        "country": {
                            "id": 0,
                            "country_name": "United States of America",
                            "region_id": 2,
                            "region": {
                                "id": 2,
                                "region_name": "Americas"
                            }
                        }
                    }
                },
                "manager": null
            },
            {
                "id": 101,
                "first_name": "Neena",
                "last_name": "Kochhar",
                "email": "neena.kochhar@sqltutorial.org",
                "phone_number": "515.123.4568",
                "hire_date": "1989-09-21",
                "job_id": 5,
                "salary": "17000.00",
                "manager_id": 100,
                "department_id": 9,
                "job": {
                    "id": 5,
                    "job_title": "Administration Vice President",
                    "min_salary": "15000.00",
                    "max_salary": "30000.00"
                },
                "department": {
                    "id": 9,
                    "department_name": "Executive",
                    "location_id": 1700,
                    "location": {
                        "id": 1700,
                        "street_address": "2004 Charade Rd",
                        "postal_code": "98199",
                        "city": "Seattle",
                        "state_province": "Washington",
                        "country_id": "US",
                        "country": {
                            "id": 0,
                            "country_name": "United States of America",
                            "region_id": 2,
                            "region": {
                                "id": 2,
                                "region_name": "Americas"
                            }
                        }
                    }
                },
                "manager": {
                    "id": 100,
                    "first_name": "Steven",
                    "last_name": "King",
                    "email": "steven.king@sqltutorial.org",
                    "phone_number": "515.123.4567",
                    "hire_date": "1987-06-17",
                    "job_id": 4,
                    "salary": "24000.00",
                    "manager_id": null,
                    "department_id": 9,
                    "job": {
                        "id": 4,
                        "job_title": "President",
                        "min_salary": "20000.00",
                        "max_salary": "40000.00"
                    },
                    "department": {
                        "id": 9,
                        "department_name": "Executive",
                        "location_id": 1700,
                        "location": {
                            "id": 1700,
                            "street_address": "2004 Charade Rd",
                            "postal_code": "98199",
                            "city": "Seattle",
                            "state_province": "Washington",
                            "country_id": "US",
                            "country": {
                                "id": 0,
                                "country_name": "United States of America",
                                "region_id": 2,
                                "region": {
                                    "id": 2,
                                    "region_name": "Americas"
                                }
                            }
                        }
                    },
                    "manager": null,
                    "dependents": [
                        {
                            "id": 4,
                            "first_name": "Jennifer",
                            "last_name": "King",
                            "relationship": "Child",
                            "employee_id": 100
                        }
                    ]
                }
            },
            ...
        ],
        "timestamp": 1634128665,
        "message": [
            "OK"
        ],
        "code": 200
    }

## Json of output /api/employee/100
received json from record #100 of Employees table

    {
        "data": {
            "id": 100,
            "first_name": "Steven",
            "last_name": "King",
            "email": "steven.king@sqltutorial.org",
            "phone_number": "515.123.4567",
            "hire_date": "1987-06-17",
            "job_id": 4,
            "salary": "24000.00",
            "manager_id": null,
            "department_id": 9,
            "job": {
                "id": 4,
                "job_title": "President",
                "min_salary": "20000.00",
                "max_salary": "40000.00"
            },
            "department": {
                "id": 9,
                "department_name": "Executive",
                "location_id": 1700,
                "location": {
                    "id": 1700,
                    "street_address": "2004 Charade Rd",
                    "postal_code": "98199",
                    "city": "Seattle",
                    "state_province": "Washington",
                    "country_id": "US",
                    "country": {
                        "id": 0,
                        "country_name": "United States of America",
                        "region_id": 2,
                        "region": {
                            "id": 2,
                            "region_name": "Americas"
                        }
                    }
                }
            },
            "manager": null,
            "dependents": [
                {
                    "id": 4,
                    "first_name": "Jennifer",
                    "last_name": "King",
                    "relationship": "Child",
                    "employee_id": 100
                }
            ]
        },
        "timestamp": 1634128755,
        "message": [
            "OK"
        ],
        "code": 200
    }

## Json of output /api/department

    {
        "data": [
            {
                "id": 1,
                "department_name": "Administration",
                "location_id": 1700,
                "location": {
                    "id": 1700,
                    "street_address": "2004 Charade Rd",
                    "postal_code": "98199",
                    "city": "Seattle",
                    "state_province": "Washington",
                    "country_id": "US",
                    "country": {
                        "id": 0,
                        "country_name": "United States of America",
                        "region_id": 2,
                        "region": {
                            "id": 2,
                            "region_name": "Americas"
                        }
                    }
                }
            },
            ...
        ],
        "timestamp": 1634129115,
        "message": [
            "OK"
        ],
        "code": 200
    }

## Json of output /api/department/1

    {
        "data": {
            "id": 1,
            "department_name": "Administration",
            "location_id": 1700,
            "location": {
                "id": 1700,
                "street_address": "2004 Charade Rd",
                "postal_code": "98199",
                "city": "Seattle",
                "state_province": "Washington",
                "country_id": "US",
                "country": {
                    "id": 0,
                    "country_name": "United States of America",
                    "region_id": 2,
                    "region": {
                        "id": 2,
                        "region_name": "Americas"
                    }
                }
            }
        },
        "timestamp": 1634129115,
        "message": [
            "OK"
        ],
        "code": 200
    }

## Json of output /api/jobs or /api/jobs/1 or /api/jobs/max_salary/1000 or /api/jobs/min_salary/9000

    {
        "data": [
            {
                "id": 1,
                "job_title": "Public Accountant",
                "min_salary": "4200.00",
                "max_salary": "9000.00"
            },
            {
                "id": 2,
                "job_title": "Accounting Manager",
                "min_salary": "8200.00",
                "max_salary": "16000.00"
            },
            {
                "id": 3,
                "job_title": "Administration Assistant",
                "min_salary": "3000.00",
                "max_salary": "6000.00"
            },
            ...
        ],
        "timestamp": 1634129262,
        "message": [
            "OK"
        ],
        "code": 200
    }


