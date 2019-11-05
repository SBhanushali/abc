import java.io.*;
import java.util.Scanner;

public class hamming 
{
    public static void main(String[] args) 
    {
        Scanner sc = new Scanner(System.in);
        System.out.println("Enter code to send");
        String send = sc.nextLine();
        char temp[] = send.toCharArray();
        int code[] = new int[8];
        for (int i = 0; i < temp.length; i++) 
        {
            code[7-i] = (int)(temp[i])- (int)'0';
        }
        code[3] = code[4];
        code[1] = code[3] ^ code[5] ^ code[7];
        code[2] = code[3] ^ code[6] ^ code[7];
        code[4] = code[5] ^ code[6] ^ code[7];
        System.out.println("Hamming code is");
        for (int i = 7; i > 0; --i) 
        {
            System.out.print(code[i]);
        }
        System.out.println();
        System.out.println("Enter received code");
        String recv = sc.nextLine();
        temp = recv.toCharArray();
        for (int i = 0; i < temp.length; i++) 
        {
            code[7-i] = (int)(temp[i])- (int)'0';
        }
        int error[] = new int[3];
        error[0] = code[1] ^ code[3] ^ code[5] ^ code[7];
        error[1] = code[2] ^ code[3] ^ code[6] ^ code[7];
        error[2] = code[4] ^ code[5] ^ code[6] ^ code[7];
        for (int i = 0; i < error.length; i++) {
            code[0] += error[i]<<i;
        }
        if(code[0]!=0)
        {
            System.out.println("Error in received code at position " + code[0]);
            System.out.print("Corrected code is: ");
            code[code[0]] ^= 1;
            for (int i = 7; i > 0; --i) 
            {
                System.out.print(code[i]);
            }
            System.out.println();
        }
        else
        {
            System.out.println("Code is error free");
        }
        System.out.println("Message received is: " + code[7] + code[6] + code[5] + code[3]);
        sc.close();
    }
}