#include <iostream>
#include <vector>
#include <time.h>
#include <stdlib.h>

using namespace std;

bool binarySearch(int value, int left, int right, int array[]);
void mergeArrays(int left, int right, int middle, int array[]);
void mergeSort(int left, int right, int array[]);

int main()
{
    int d1[10000], d2[10000];
    vector<int> commonItems;
    
    for(int i = 0; i < 10000; i++)
    {
      d1[i] = rand()%10000+1;   
      d2[i] = rand()%10000+1;
    }
    
    /*
    for(int i = 0; i < 10000; i++)
    {
      cout << d1[i] << "    " << d2[i] << endl;
    }
    */
    //I’m going to start by sorting  with a mergesort, since it’s a relatively small amount of data
    mergeSort(0,sizeof(d1)/sizeof(d1[0]),d1);
    mergeSort(0,sizeof(d2)/sizeof(d2[0]),d2);

    int previousValue = 0; //Used for making sure we don’t do unnecessary searches  
    for(int i = 0; i < sizeof(d1)/sizeof(d1[0]); i++)
    {
        if(d1[i] != previousValue)
        {
            if(binarySearch(d1[i], 0, sizeof(d2)/sizeof(d2[0]), d2))
            {
                commonItems.push_back(d1[i]);
            }
        }
        previousValue = d1[i];
    }
    
    for(int i = 0; i < commonItems.size(); i++)
    {
        cout << commonItems[i] << endl;
    }

    //After this the vector will be filled with any items that exist in both d1 and d2, and it will be 
    //already sorted. The algorithms used are both efficient for the size of the list being sorted
    // and searched
    
    return 0;
}

bool binarySearch(int value, int left, int right, int array[])
{
    while (left <= right)
    {
        int middle = (left + right) /2;
        if(array[middle] == value)
            return true;
        else if (array[middle] > value)
            right = middle - 1;
        else 
            left = middle + 1;
    }
    return false;
}

void mergeArrays(int left, int right, int middle, int array[])
{
    int subArraySize1 = middle - left +1;
    int subArraySize2 = right - middle;

    int leftArray[subArraySize1];
    int rightArray[subArraySize2];

    //creating two temp arrays for merging

    for(int i = 0; i < subArraySize1; i++)
    {
        leftArray[i] = array[left+i];
    }
    for(int c = 0; c < subArraySize2; c++)
    {
    rightArray[c] = array[middle + 1 + c];
    }
    int i = 0; 
    int j = 0;
    int k = left;
    //Indexes for the subarrays, used for looping

    while(i < subArraySize1 && j < subArraySize2)
    {
        if(leftArray[i] <= rightArray[j])
        {
            array[k] = leftArray[i];
            i++; 
        } else {
            array[k] = rightArray[j];
            j++;
        }
    k++;
    }

    while (i <subArraySize1)
    {
        array[k] = leftArray[i];
        i++;
        k++;
    }

    while(j < subArraySize2)
    {
        array[k] = rightArray[j];
        j++; 
        k++;
    }
}

void mergeSort(int left, int right, int array[])
{
    if(left < right)
    {
        int middle = left+(right-left)/2;

        mergeSort(left, middle,array);
        mergeSort(middle+1, right, array);
        
        mergeArrays(left, right, middle, array);
   }
   
}
