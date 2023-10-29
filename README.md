//Here is the final code:
#include <stdio.h>
#include <stdlib.h>

// Function prototypes for your operations
void addStudent();
void searchStudentByName();
void deleteNextStudentByName();
void printStudentWithLongestName();

int main() {
    int choice;

    while (1) {
        printf("\nStudent Record Menu:\n");
        printf("1. Add Student\n");
        printf("2. Search Student by Name\n");
        printf("3. Delete Next Student by Name\n");
        printf("4. Print Student with Longest Name\n");
        printf("5. Exit\n");
        printf("Enter your choice: ");
        scanf("%d", &choice);

        switch (choice) {
            case 1:
                addStudent();
                break;
            case 2:
                searchStudentByName();
                break;
            case 3:
                deleteNextStudentByName();
                break;
            case 4:
                printStudentWithLongestName();
                break;
            case 5:
                // Exit the program
                exit(0);
            default:
                printf("Invalid choice. Please select a valid option.\n");
        }
    }

    return 0;
}

// Implement your functions (e.g., addStudent, searchStudentByName, deleteNextStudentByName, printStudentWithLongestName) here.






And The whole codes:






//question 1 Already solved.
//Question 2:
#include <stdio.h>
#include <stdlib.h>

// Function to compare two integers for sorting in descending order
int compare(const void *a, const void *b) {
    return ((int)b - (int)a);
}

int main() {
    int numbers[100];

    // Seed the random number generator with the current time
    srand(time(0));

    // Generate and add 100 random numbers to the list
    for (int i = 0; i < 100; i++) {
        numbers[i] = rand() % 1000; // You can adjust the range as needed
    }

    // Sort the numbers in descending order
    qsort(numbers, 100, sizeof(int), compare);

    // Print the sorted numbers
    printf("Sorted numbers (largest to smallest):\n");
    for (int i = 0; i < 100; i++) {
        printf("%d ", numbers[i]);
    }
    printf("\n");

    return 0;
}





//question 4:
#include <stdio.h>
#include <stdlib.h>

// Define a structure for a student
struct Student {
    int student_number;
    char name[50];
    int age;
    int registration_number;
    struct Student* next;
};

// Function to add a student to the list
void addStudent(struct Student** head, int student_number, char name[], int age, int registration_number) {
    struct Student* newStudent = (struct Student*)malloc(sizeof(struct Student));
    newStudent->student_number = student_number;
    strcpy(newStudent->name, name);
    newStudent->age = age;
    newStudent->registration_number = registration_number;
    newStudent->next = *head;
    *head = newStudent;
}

// Function to traverse and print the student information
void printStudents(struct Student* head) {
    int count = 1;
    while (head != NULL) {
        printf("%d - %s %d %d\n", head->student_number, head->name, head->age, head->registration_number);
        head = head->next;
        count++;
    }
}

int main() {
    struct Student* head = NULL;

    // Adding sample student records
    addStudent(&head, 1, "Saliha", 27, 201);
    addStudent(&head, 2, "Ece", 19, 203);

    // Printing student information and counting
    printf("Student Information:\n");
    printStudents(head);
    int studentCount = 0;
    struct Student* current = head;
    while (current != NULL) {
        studentCount++;
        current = current->next;
    }
    printf("Total students: %d\n", studentCount);

    // Free allocated memory (important when you're done with the list)
    while (head != NULL) {
        struct Student* temp = head;
        head = head->next;
        free(temp);
    }

    return 0;
}





//Question 5:
#include <stdio.h>
#include <stdlib.h>
#include <string.h>

// Define a structure for a student
struct Student {
    int student_number;
    char name[50];
    int age;
    int registration_number;
    struct Student* next;
};

// Function to add a student to the list
void addStudent(struct Student** head, int student_number, char name[], int age, int registration_number) {
    struct Student* newStudent = (struct Student*)malloc(sizeof(struct Student));
    newStudent->student_number = student_number;
    strcpy(newStudent->name, name);
    newStudent->age = age;
    newStudent->registration_number = registration_number;
    newStudent->next = *head;
    *head = newStudent;
}

// Function to print student information
void printStudent(struct Student* student) {
    printf("%d - %s %d %d\n", student->student_number, student->name, student->age, student->registration_number);
}

// Function to search for a student by name and print their information
void searchStudentByName(struct Student* head, const char* searchName) {
    struct Student* current = head;
    int found = 0;

    while (current != NULL) {
        if (strcmp(current->name, searchName) == 0) {
            printf("Student found with the name \"%s\":\n", searchName);
            printStudent(current);
            found = 1;
        }
        current = current->next;
    }

    if (!found) {
        printf("No student found with the name \"%s\".\n", searchName);
    }
}

int main() {
    struct Student* head = NULL;

    // Adding sample student records
    addStudent(&head, 1, "Saliha", 27, 201);
    addStudent(&head, 2, "Ece", 19, 203);

    // Printing student information
    printf("Student Information:\n");
    struct Student* current = head;
    while (current != NULL) {
        printStudent(current);
        current = current->next;
    }

    // Searching for a student by name
    searchStudentByName(head, "Saliha");
    searchStudentByName(head, "John");

    // Free allocated memory
    while (head != NULL) {
        struct Student* temp = head;
        head = head->next;
        free(temp);
    }

    return 0;
}









//Question 6:
#include <stdio.h>
#include <stdlib.h>
#include <string.h>

// Define a structure for a student
struct Student {
    int student_number;
    char name[50];
    int age;
    int registration_number;
    struct Student* next;
};

// Function to add a student to the list
void addStudent(struct Student** head, int student_number, char name[], int age, int registration_number) {
    struct Student* newStudent = (struct Student*)malloc(sizeof(struct Student));
    newStudent->student_number = student_number;
    strcpy(newStudent->name, name);
    newStudent->age = age;
    newStudent->registration_number = registration_number;
    newStudent->next = *head;
    *head = newStudent;
}

// Function to print student information
void printStudent(struct Student* student) {
    printf("%d - %s %d %d\n", student->student_number, student->name, student->age, student->registration_number);
}

// Function to search for a student by name and delete the next student
void deleteNextStudentByName(struct Student* head, const char* searchName) {
    struct Student* current = head;
    int found = 0;

    while (current != NULL) {
        if (strcmp(current->name, searchName) == 0) {
            if (current->next != NULL) {
                struct Student* temp = current->next;
                current->next = temp->next;
                free(temp);
                found = 1;
                printf("Deleted the student following \"%s\":\n", searchName);
                printStudent(current);
            } else {
                printf("No student found following \"%s\" to delete.\n", searchName);
            }
        }
        current = current->next;
    }

    if (!found) {
        printf("No student found with the name \"%s\".\n", searchName);
    }
}

int main() {
    struct Student* head = NULL;

    // Adding sample student records
    addStudent(&head, 1, "Saliha", 27, 201);
    addStudent(&head, 2, "Ece", 19, 203);

    // Printing student information
    printf("Student Information:\n");
    struct Student* current = head;
    while (current != NULL) {
        printStudent(current);
        current = current->next;
    }

    // Deleting the next student following "Saliha"
    deleteNextStudentByName(head, "Saliha");

    // Printing updated student information
    printf("\nUpdated Student Information:\n");
    current = head;
    while (current != NULL) {
        printStudent(current);
        current = current->next;
    }

    // Free allocated memory
    while (head != NULL) {
        struct Student* temp = head;
        head = head->next;
        free(temp);
    }

    return 0;
}









//Question 7:

#include <stdio.h>
#include <stdlib.h>
#include <string.h>

// Define a structure for a student
struct Student {
    int student_number;
    char name[50];
    int age;
    int registration_number;
    struct Student* next;
};

// Function to add a student to the list
void addStudent(struct Student** head, int student_number, char name[], int age, int registration_number) {
    struct Student* newStudent = (struct Student*)malloc(sizeof(struct Student));
    newStudent->student_number = student_number;
    strcpy(newStudent->name, name);
    newStudent->age = age;
    newStudent->registration_number = registration_number;
    newStudent->next = *head;
    *head = newStudent;
}

// Function to find and print the student with the longest name
void printStudentWithLongestName(struct Student* head) {
    struct Student* current = head;
    char longestName[50];
    int maxLength = 0;

    while (current != NULL) {
        int currentLength = strlen(current->name);
        if (currentLength > maxLength) {
            maxLength = currentLength;
            strcpy(longestName, current->name);
        }
        current = current->next;
    }

    if (maxLength > 0) {
        printf("The longest name in the list: %s\n", longestName);
        printf("Length: %d\n", maxLength);
    } else {
        printf("No student records found.\n");
    }
}

int main() {
    struct Student* head = NULL;

    // Adding sample student records
    addStudent(&head, 1, "Saliha", 27, 201);
    addStudent(&head, 2, "Ece", 19, 203);
    addStudent(&head, 3, "Abdurrahmangazi", 25, 204);

    // Printing student information
    printf("Student Information:\n");
    struct Student* current = head;
    while (current != NULL) {
        printf("%d - %s %d %d\n", current->student_number, current->name, current->age, current->registration_number);
        current = current->next;
    }

    // Find and print the student with the longest name
    printStudentWithLongestName(head);

    // Free allocated memory
    while (head != NULL) {
        struct Student* temp = head;
        head = head->next;
        free(temp);
    }

    return 0;
}
