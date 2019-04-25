package Tests.TestCases;

import java.util.Random;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.chrome.ChromeDriver;
import org.openqa.selenium.interactions.Actions;
import org.testng.Assert;
import org.testng.annotations.AfterMethod;
import org.testng.annotations.AfterTest;
import org.testng.annotations.BeforeTest;
import org.testng.annotations.Test;

import Tests.PageObjects.FrontPage;


public class addNewBeaconUploadFileBeforeFillingDataCase {
	
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
	int id = ran.nextInt(999);
	
	@Test
	public void newBeaconWithFileBeforeData() throws InterruptedException {
		objFront = new FrontPage(driver);
		objFront.setLogin("admin");
		objFront.setPassword("admin");
		objFront.login();
		objFront.addFile("akcja testowa");
		objFront.setMajorID(id);
		objFront.setMinorID(id);
		objFront.setBcnName("beacon nr." +nxt);
		objFront.setBcnGrp("grupa Test");
		objFront.setBcnLoc("miasto Test");
		objFront.setBcnAddr("ulica Test");
		Thread.sleep(1000);
		objFront.newBeacon();
		objFront.bcnList();
		Assert.assertEquals(driver.findElement(By.xpath("//div[contains(text(),'"+objFront.getBcnName()+"')]")).getText(), objFront.getBcnName());
	}
	
	@AfterMethod
	public void closeDriver() throws InterruptedException {
		objFront = new FrontPage(driver);
		Thread.sleep(1000);
		objFront.logout();
        //System.out.println("Test przeprowadzony prawid³owo, Beacon zosta³ dodany.");
        driver.quit();
    }
}
