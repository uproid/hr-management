## the tools:

	Docker *
	Mysql
	PHP
	Laravel *		

## endpoints:

    1.	GET    /api/employee                All employees
    2.	GET    /api/employee/1              An empeloyee number 1
    3.	GET    /api/deppartments            All Deppartments
    4.	GET    /api/deppartments/1          An deppartment number 1
    5.	GET    /api/jobs                    All Jobs
    6.	GET    /api/jobs/min_salary/100     All Jobs that they have minimal 100$ salary
    7.	GET    /api/jobs/max_salary/100     All Jobs that they have maximal 100$ salary
    8.	POST   /api/employee                Add an Employee
    9.	PUT    /api/employee/id             Update an Employee


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
	


