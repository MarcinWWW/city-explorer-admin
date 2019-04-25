package Tests.TestCases;

import static org.testng.Assert.assertEquals;

import java.util.Random;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.chrome.ChromeDriver;
import org.testng.Assert;
import org.testng.annotations.AfterMethod;
import org.testng.annotations.AfterTest;
import org.testng.annotations.BeforeTest;
import org.testng.annotations.Test;

import Tests.PageObjects.FrontPage;


public class invalidRegistrationUserCase2 {
	
	WebDriver driver;
	FrontPage objFront;
	@BeforeTest
	public void setup() {
		System.setProperty("webdriver.chrome.driver", "D:\\Selenium\\chromedriver.exe");	//PRACA
		driver = new ChromeDriver();
		driver.manage().window().maximize();
		driver.get("https://cityexplorer.000webhostapp.com/");
	}
	
	Random ran = new Random();
	int nxt = ran.nextInt(99999);
	
	@Test
	public void invalidUserRegistrationWithSameLogin() throws InterruptedException {
		objFront = new FrontPage(driver);
		objFront.createAcc(); 
		objFront.setNewLogin("tester");
		objFront.setNewPassword("pw");
		objFront.setNewEmail("automatmail"+nxt+"@cndps.com");
		objFront.saveNewAccount();
		//System.out.println(driver.findElement(By.xpath("//p[@id='komunikat_tresc']")).getText());
		assertEquals(driver.findElement(By.xpath("//p[@id='komunikat_tresc']")).getText(), "Rejestracja nie powiod³a siê.\n" + 
				"Podany LOGIN ju¿ istnieje w systemie");
	}
	
	@AfterMethod
	public void closeDriver() throws InterruptedException {
		objFront = new FrontPage(driver);
		Thread.sleep(1000);
        driver.quit();
    }
}
