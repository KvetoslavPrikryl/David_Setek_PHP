const input = document.querySelector(".filter-input")
const allStudents = document.querySelectorAll(".one-student")
const divAllStudents = document.querySelector(".all-students")
const allStudentsArray = Array.from(allStudents)

const studentsObject = allStudentsArray.map((oneStudent, index) => {
    return {
        id: index,
        studentsName: oneStudent.querySelector("h2").textContent,
        studentList: oneStudent.querySelector("a"),
    }
})

input.addEventListener("input", ()=>{
    const inputText = input.value.toLowerCase()
    const filtredStudents = studentsObject.filter((student)=>{
        return student.studentsName.toLowerCase().includes(inputText)
    })

    divAllStudents.textContent = ""

    filtredStudents.map((oneFiltredStudent)=>{
        const newDiv = document.createElement("div")
        newDiv.classList.add("one-student")

        const newH2 = document.createElement("h2")
        newH2.textContent = oneFiltredStudent.studentsName

        newDiv.append(newH2)
        newDiv.append(oneFiltredStudent.studentList)

        divAllStudents.append(newDiv)
    })
})

