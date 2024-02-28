class employee:
    def __init__(self,name,department,salary):
        self.name=name
        self.department=department
        self.salary=salary
        
    def show(self):
        print("Name :",self.name)
        print("Salary :",self.salary)
        print("Department :",self.department)
        
e=employee("Pranali","Account",50000)
e.show()        